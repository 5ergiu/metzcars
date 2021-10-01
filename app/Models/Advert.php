<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'autovit_id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /** @var string[]  */
    protected $fillable = [
        'autovit_id',
        'description',
        'price',
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
        'date_registration',
        'registered',
        'original_owner',
        'no_accident',
        'service_record',
        'historical_vehicle',
        'tuning',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'features' => 'array',
    ];
}
