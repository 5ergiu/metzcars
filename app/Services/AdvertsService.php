<?php

namespace App\Services;

use App\Models\Advert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
     * @return void
     */
    public function updatePortfolio(): void
    {
        $autovitAdverts = json_decode($this->autovitService->getAdverts(), true)['results'];

        foreach ($autovitAdverts as $autovitAdvert) {
            $directory = uniqid();

            if (!Advert::firstWhere('autovit_id', $autovitAdvert['id'])) {
                $this->uploadsService->saveAutovitAdvertImages($directory, $autovitAdvert['photos']);
                Advert::create($this->buildAdvert($autovitAdvert, $directory));
            }
        }
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

    /**
     * Build the array model to store in the database.
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
            'url'                => $advert['url'],
            'added_on'           => $advert['created_at'],
            'city'               => $advert['city']['ro'],
            'description'        => $advert['description'],
            'price'              => $advert['params']['price']['gross_net'] === 'net' ? ($advert['params']['price']['1'] * 1.19) : $advert['params']['price']['1'],
            'deductible_vat'     => $advert['params']['price']['gross_net'] === 'net',
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
            'rhd'                => $advert['params']['rhd'] === '1',
            'particle_filter'    => $advert['params']['particle_filter'] === '1',
            'urban_consumption'  => $advert['params']['urban_consumption'],
            'body_type'          => $advert['params']['body_type'],
            'co2_emissions'      => $advert['params']['co2_emissions'],
            'door_count'         => $advert['params']['door_count'],
            'color'              => $advert['params']['color'],
            'color_type'         => $advert['params']['colour_type'],
            'features'           => $advert['params']['features'],
            'registration_date'  => $advert['params']['date_registration'],
            'registered'         => $advert['params']['registered'] === '1',
            'original_owner'     => $advert['params']['original_owner'] === '1',
            'no_accident'        => $advert['params']['no_accident'] === '1',
            'service_record'     => $advert['params']['service_record'] === '1',
            'directory'          => $directory,
        ];
    }
}
