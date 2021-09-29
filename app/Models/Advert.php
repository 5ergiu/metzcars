<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    /** @var string[]  */
    protected $fillable = [
        'autovit_id',
        'description',
        'price',
        'vat',
        'rhd',
        'make',
        'model',
        'version',
        'generation',
        'year',
        'mileage',
        'vin',
        'fuel_type',
        'engine_power',
        'engine_capacity',
        'transmission',
        'gearbox',
        'pollution_standard',
        'particle_filter',
        'urban_consumption',
        'body_type',
        'co2_emissions',
        'door_count',
        'color',
        'colour_type',
        'features',
        'country_origin',
        'date_registration',
        'registered',
        'original_owner',
        'no_accident',
        'service_record',
        'historical_vehicle',
        'tuning',
    ];
}
