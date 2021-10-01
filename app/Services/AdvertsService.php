<?php

namespace App\Services;

use App\Models\Advert;

class AdvertsService
{
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
                $adverts[] = $this->buildAdvert($autovitAdvert);
            }
        }

        if (!empty($adverts)) {
            Advert::insert($adverts);
        }
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
            'description'        => $advert['description'],
            'price'              => $advert['params']['price']['1'],
            'rhd'                => $advert['params']['rhd'] === '1',
            'make'               => $advert['params']['make'],
            'model'              => $advert['params']['model'],
            'version'            => $advert['params']['version'],
            'generation'         => $advert['params']['generation'],
            'year'               => $advert['params']['year'],
            'mileage'            => $advert['params']['mileage'],
            'vin'                => $advert['params']['vin'],
            'fuel_type'          => $advert['params']['fuel_type'],
            'engine_power'       => $advert['params']['engine_power'],
            'engine_capacity'    => $advert['params']['engine_capacity'],
            'transmission'       => $advert['params']['transmission'],
            'gearbox'            => $advert['params']['gearbox'],
            'pollution_standard' => $advert['params']['pollution_standard'],
            'particle_filter'    => $advert['params']['particle_filter'],
            'urban_consumption'  => $advert['params']['urban_consumption'],
            'body_type'          => $advert['params']['body_type'],
            'co2_emissions'      => $advert['params']['co2_emissions'],
            'door_count'         => $advert['params']['door_count'],
            'color'              => $advert['params']['color'],
            'colour_type'        => $advert['params']['colour_type'],
            'features'           => json_encode($advert['params']['features']),
            'date_registration'  => $advert['params']['date_registration'],
            'registered'         => $advert['params']['registered'] === '1',
            'original_owner'     => $advert['params']['original_owner'] === '1',
            'no_accident'        => $advert['params']['no_accident'] === '1',
            'service_record'     => $advert['params']['service_record'] === '1',
            'historical_vehicle' => $advert['params']['historical_vehicle'] === '1',
            'tuning'             => $advert['params']['tuning'] === '1',
        ];
    }
}
