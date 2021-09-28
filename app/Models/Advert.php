<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    /** @var string[]  */
    protected $fillable = [
        'autovit_id',
        'make',
        'model',
        'year',
        'price',
        'fuel_type',
        'engine_power',
        'engine_capacity',
        'gearbox',
        'version',
        'vin',
        'generation',
        'mileage',
        'body_type',
        'color',
        'colour_type',
        'transmission',
        'pollution_standard',
        'particle_filter',
        'co2_emissions',
        'features',
    ];
}
