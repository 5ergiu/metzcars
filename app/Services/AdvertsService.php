<?php

namespace App\Services;

use App\Models\Advert;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class AdvertsService
{

    private AutovitService $autovitService;
    private UploadsService $uploadsService;

    public function __construct() {
        $this->autovitService = new AutovitService;
        $this->uploadsService = new UploadsService;
    }

    /**
     * Used to update portfolio(cron)
     */
    public function updatePortfolio()
    {
        $adverts        = [];
        $directory       = uniqid();
        $autovitAdverts = json_decode($this->autovitService->getAdverts(), true)['results'];

        foreach ($autovitAdverts as $key => $autovitAdvert) {
            if (Advert::find($autovitAdvert['id'])) {
                unset($autovitAdvert[$key]);
            } else {
                $this->uploadsService->saveAutovitAdvertImages($directory, $autovitAdvert['photos']);
                $adverts[] = $this->buildAdvert($autovitAdvert, $directory);
            }
        }

        if (!empty($adverts)) {
            Advert::insert($adverts);
        }
    }

    /**
     * Returns a collection with the formatted autovit adverts.
     * @param int|null $page
     * @param int|null $limit
     * @return Collection
     */
    public function getFormattedAdvertsForStock(?int $page = null, ?int $limit = null): Collection
    {
        $adverts = [];
        $autovitAdverts = $this->autovitService->getActiveAdverts($page, $limit);

        foreach ($autovitAdverts as $autovitAdvert) {
            $adverts[] = Advert::make($this->buildAdvert($autovitAdvert, null));
        }

        return collect($adverts);
    }

    /**
     * Build the proper array model to store in the database.
     * @param array $advert
     * @param string|null $directory
     * @return array
     */
    private function buildAdvert(array $advert, ?string $directory): array
    {
        return [
            'autovit_id'         => $advert['id'],
            'title'              => $advert['title'],
            'status'             => $advert['status'],
//            'special_offer'      => Advert::where(['autovit_id' => $advert['id']], ['special_offer' => 1])->firstOrFail() ?? false,
//            'sold'               => Advert::where(['autovit_id' => $advert['id']], ['sold' => 1])->firstOrFail() ?? false,
//            'deductible_vat'     => Advert::where(['autovit_id' => $advert['id']], ['deductible_vat' => 1])->firstOrFail() ?? false,
//            'invoice_issued'     => Advert::where(['autovit_id' => $advert['id']], ['invoice_issued' => 1])->firstOrFail() ?? false,
            'url'                => $advert['url'],
            'added_on'           => $advert['created_at'],
            'city'               => $advert['city']['ro'],
            'description'        => $advert['description'],
            'price'              => $advert['params']['price']['1'],
            'brand'              => $this->formatStrings($advert['params']['make']),
            'model'              => $this->formatStrings($advert['params']['model']),
            'version'            => $this->formatStrings($advert['params']['version']),
            'generation'         => $this->formatStrings($advert['params']['generation']),
            'year'               => $advert['params']['year'],
            'mileage'            => $advert['params']['mileage'],
            'vin'                => $advert['params']['vin'],
            'fuel_type'          => $advert['params']['fuel_type'],
            'engine_power'       => $advert['params']['engine_power'],
            'engine_capacity'    => $advert['params']['engine_capacity'],
            'transmission'       => $advert['params']['transmission'],
            'gearbox'            => $advert['params']['gearbox'],
            'pollution_standard' => $this->formatStrings($advert['params']['pollution_standard']),
            'particle_filter'    => $advert['params']['particle_filter'],
            'urban_consumption'  => $advert['params']['urban_consumption'],
            'body_type'          => $advert['params']['body_type'],
            'co2_emissions'      => $advert['params']['co2_emissions'],
            'door_count'         => $advert['params']['door_count'],
            'color'              => $advert['params']['color'],
            'color_type'         => $advert['params']['colour_type'],
            'features'           => json_encode($advert['params']['features']),
            'vat'                => $advert['params']['vat'] === '1',
            'registration_date'  => $advert['params']['date_registration'],
            'registered'         => $advert['params']['registered'] === '1',
            'original_owner'     => $advert['params']['original_owner'] === '1',
            'no_accident'        => $advert['params']['no_accident'] === '1',
            'service_record'     => $advert['params']['service_record'] === '1',
            'historical_vehicle' => $advert['params']['historical_vehicle'] === '1',
            'tuning'             => $advert['params']['tuning'] === '1',
            'directory'          => $directory,
        ];
    }

    /**
     * Formats strings to be ready for database insertion.
     * @param string $text
     * @return string
     */
    private function formatStrings(string $text): string
    {
        return str_replace('-', ' ', Str::of($text)->ucfirst());
    }
}
