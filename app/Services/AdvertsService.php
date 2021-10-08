<?php

namespace App\Services;

use App\Models\Advert;
use finfo;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdvertsService
{
    const SIZE_S = '320x240';
    const SIZE_L = '1280x800';

    private AutovitService $autovitService;

    public function __construct() {
        $this->autovitService = new AutovitService;
    }

    /**
     * Used to update portfolio(cron)
     */
    public function updatePortfolio()
    {
        $adverts = [];
        $autovitAdverts = json_decode($this->autovitService->getAdverts(), true)['results'];

        foreach ($autovitAdverts as $key => $autovitAdvert) {
            if (Advert::find($autovitAdvert['id'])) {
                unset($autovitAdvert[$key]);
            } else {
                $this->saveAdvertImages($autovitAdvert['id'], $autovitAdvert['photos']);
                $adverts[] = $this->buildAdvert($autovitAdvert);
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
            $adverts[] = Advert::make($this->buildAdvert($autovitAdvert));
        }

        return collect($adverts);
    }

    /**
     * Build the proper array model to store in the database.
     * @param array $advert
     * @return array
     */
    private function buildAdvert(array $advert): array
    {
        return [
            'autovit_id'         => $advert['id'],
            'title'              => $advert['title'],
            'status'             => $advert['status'],
            'url'                => $advert['url'],
            'added_on'           => $advert['created_at'],
            'city'               => $advert['city']['ro'],
//            'special_offer'      => Advert::where(['autovit_id' => $advert['id']], ['special_offer' => 1])->firstOrFail() ?? false,
//            'sold'               => Advert::where(['autovit_id' => $advert['id']], ['sold' => 1])->firstOrFail() ?? false,
//            'deductible_vat'     => Advert::where(['autovit_id' => $advert['id']], ['deductible_vat' => 1])->firstOrFail() ?? false,
//            'invoice_issued'     => Advert::where(['autovit_id' => $advert['id']], ['invoice_issued' => 1])->firstOrFail() ?? false,
            'description'        => $advert['description'],
            'price'              => $advert['params']['price']['1'],
            'rhd'                => $advert['params']['rhd'] === '1',
            'brand'              => $this->formatStrings($advert['params']['make']),
            'model'              => $this->formatStrings($advert['params']['model']),
            'version'            => $this->formatStrings($advert['params']['version']),
            'generation'         => $this->formatStrings($advert['params']['generation']),
            'year'               => $advert['params']['year'],
            'mileage'            => $advert['params']['mileage'],
            'vin'                => $advert['params']['vin'],
            'fuel_type'          => $this->formatStrings($advert['params']['fuel_type']),
            'engine_power'       => $advert['params']['engine_power'],
            'engine_capacity'    => $advert['params']['engine_capacity'],
            'transmission'       => $this->formatStrings($advert['params']['transmission']),
            'gearbox'            => $this->formatStrings($advert['params']['gearbox']),
            'pollution_standard' => $this->formatStrings($advert['params']['pollution_standard']),
            'particle_filter'    => $advert['params']['particle_filter'],
            'urban_consumption'  => $advert['params']['urban_consumption'],
            'body_type'          => $this->formatStrings($advert['params']['body_type']),
            'co2_emissions'      => $advert['params']['co2_emissions'],
            'door_count'         => $advert['params']['door_count'],
            'color'              => $this->formatStrings($advert['params']['color']),
            'color_type'         => $this->formatStrings($advert['params']['colour_type']),
            'features'           => json_encode($advert['params']['features']),
            'vat'                => $advert['params']['vat'] === '1',
            'registration_date'  => $advert['params']['date_registration'],
            'registered'         => $advert['params']['registered'] === '1',
            'original_owner'     => $advert['params']['original_owner'] === '1',
            'no_accident'        => $advert['params']['no_accident'] === '1',
            'service_record'     => $advert['params']['service_record'] === '1',
            'historical_vehicle' => $advert['params']['historical_vehicle'] === '1',
            'tuning'             => $advert['params']['tuning'] === '1',
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

    /**
     * Saves advert images to public storage.
     * @param int $advertId
     * @param array $photos
     */
    private function saveAdvertImages(int $advertId, array $photos): void
    {
        foreach ($photos as $key => $photo) {
            foreach ($photo as $size => $url) {
                if ($size === self::SIZE_S || $size === self::SIZE_L) {
                    $buffer = file_get_contents($url);
                    $mime   = (new finfo(FILEINFO_MIME_TYPE))->buffer($buffer);
                    $ext    = substr($mime, strrpos($mime, '/') + 1);

                    if ($size === self::SIZE_S) {
                        Storage::put("images/$advertId/thumbs/$key.$ext", $buffer);
                    } elseif ($size === self::SIZE_L) {
                        Storage::put("images/$advertId/$key.$ext", $buffer);
                    }
                }
            }
        }
    }
}
