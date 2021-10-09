<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    /** @var string[]  */
    protected $fillable = [
        'autovit_id',
        'title',
        'status',
        'special_offer',
        'sold',
        'deductible_vat',
        'invoice_issued',
        'url',
        'added_on',
        'city',
        'description',
        'price',
        'brand',
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
        'color_type',
        'features',
        'vat',
        'registration_date',
        'registered',
        'original_owner',
        'no_accident',
        'service_record',
        'directory',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'special_offer'  => false,
        'sold'           => false,
        'deductible_vat' => false,
        'invoice_issued' => false,
        'registered'     => false,
        'original_owner' => false,
        'no_accident'    => false,
        'service_record' => false,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'features'           => 'array',
        'special_offer'      => 'boolean',
        'sold'               => 'boolean',
        'deductible_vat'     => 'boolean',
        'invoice_issued'     => 'boolean',
        'registered'         => 'boolean',
        'original_owner'     => 'boolean',
        'no_accident'        => 'boolean',
        'service_record'     => 'boolean',
    ];
}
