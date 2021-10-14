<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    use HasFactory;

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
        'rhd',
        'particle_filter',
        'urban_consumption',
        'body_type',
        'co2_emissions',
        'door_count',
        'color',
        'color_type',
        'country_origin',
        'features',
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
        'special_offer'   => false,
        'sold'            => false,
        'deductible_vat'  => false,
        'invoice_issued'  => false,
        'rhd'             => false,
        'particle_filter' => false,
        'registered'      => false,
        'original_owner'  => false,
        'no_accident'     => false,
        'service_record'  => false,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'features'        => 'array',
        'special_offer'   => 'boolean',
        'sold'            => 'boolean',
        'deductible_vat'  => 'boolean',
        'invoice_issued'  => 'boolean',
        'rhd'             => 'boolean',
        'particle_filter' => 'boolean',
        'country_origin'  => 'integer',
        'registered'      => 'boolean',
        'original_owner'  => 'boolean',
        'no_accident'     => 'boolean',
        'service_record'  => 'boolean',
    ];

    /**
     * Check if an advert can become special.
     * @return bool
     */
    public static function canBeSpecial(): bool
    {
        return (bool)Advert::where('special_offer', true)->limit(1)->get();
    }
}
