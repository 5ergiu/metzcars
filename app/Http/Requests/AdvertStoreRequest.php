<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules(): array
    {
        return [
            'advert.title'           => 'required',
            'advert.brand'           => 'required',
            'advert.model'           => 'required',
            'advert.version'         => 'required',
            'advert.year'            => 'required',
            'advert.mileage'         => 'required',
            'advert.vin'             => 'required',
            'advert.fuel_type'       => 'required',
            'advert.engine_power'    => 'required',
            'advert.engine_capacity' => 'required',
            'advert.gearbox'         => 'required',
            'advert.body_type'       => 'required',
            'advert.door_count'      => 'required',
            'advert.color'           => 'required',
            'advert.features'        => 'required',
        ];
    }

    /**
     * Custom message for validation
     * @return array
     */
    public function messages(): array
    {
        return [
            'advert.title.required'           => __('validation.required', ['attribute' => __('advert.title')]),
            'advert.brand.required'           => __('validation.required', ['attribute' => __('advert.brand')]),
            'advert.model.required'           => __('validation.required', ['attribute' => __('advert.model')]),
            'advert.version.required'         => __('validation.required', ['attribute' => __('advert.version')]),
            'advert.year.required'            => __('validation.required', ['attribute' => __('advert.year')]),
            'advert.mileage.required'         => __('validation.required', ['attribute' => __('advert.mileage')]),
            'advert.vin.required'             => __('validation.required', ['attribute' => __('advert.vin')]),
            'advert.fuel_type.required'       => __('validation.required', ['attribute' => __('advert.fuel_type')]),
            'advert.engine_power.required'    => __('validation.required', ['attribute' => __('advert.engine_power')]),
            'advert.engine_capacity.required' => __('validation.required', ['attribute' => __('advert.engine_capacity')]),
            'advert.gearbox.required'         => __('validation.required', ['attribute' => __('advert.gearbox')]),
            'advert.body_type.required'       => __('validation.required', ['attribute' => __('advert.body_type')]),
            'advert.door_count.required'      => __('validation.required', ['attribute' => __('advert.door_count')]),
            'advert.color.required'           => __('validation.required', ['attribute' => __('advert.color')]),
            'advert.features.required'        => __('validation.required', ['attribute' => __('advert.features')]),
        ];
    }
}
