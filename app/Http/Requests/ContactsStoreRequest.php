<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactsStoreRequest extends FormRequest
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
            'contact.brand'   => 'max:255|nullable',
            'contact.model'   => 'max:255|nullable',
            'contact.name'    => 'required|max:255',
            'contact.email'   => 'required|email:rfc|max:255',
            'contact.phone'   => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'contact.message' => 'max:255|nullable',
            'contact.price'   => 'max:255|nullable',
            'contact.year'    => 'max:255|nullable',
        ];
    }

    /**
     * Custom message for validation
     * @return array
     */
    public function messages(): array
    {
        return [
            'contact.brand.max'        => __('validation.max.string', ['attribute' => __('contacts.brand'), 'max' => 255]),
            'contact.model.max'        => __('validation.max.string', ['attribute' => __('contacts.model'), 'max' => 255]),
            'contact.name.required'   => __('validation.required', ['attribute' => __('contacts.name')]),
            'contact.name.max'        => __('validation.max.string', ['attribute' => __('contacts.name'), 'max' => 255]),
            'contact.email.required'  => __('validation.required', ['attribute' => __('contacts.email')]),
            'contact.email.email'     => __('validation.email', ['attribute' => __('contacts.email')]),
            'contact.email.max'       => __('validation.max.string', ['attribute' => __('contacts.email'), 'max' => 255]),
            'contact.phone.required'  => __('validation.required', ['attribute' => __('contacts.phone'), 'max' => 255]),
            'contact.phone.max'       => __('validation.max.string', ['attribute' => __('contacts.phone'), 'max' => 15]),
            'contact.phone.min'       => __('validation.min.string', ['attribute' => __('contacts.phone'), 'min' => 10]),
            'contact.phone.regex'     => __('validation.regex', ['attribute' => __('contacts.phone')]),
            'contact.price.max'       => __('validation.max.string', ['attribute' => __('contacts.price'), 'max' => 15]),
            'contact.year.max'        => __('validation.max.string', ['attribute' => __('contacts.year'), 'max' => 15]),
            'contact.message.max'     => __('validation.max.string', ['attribute' => __('contacts.message'), 'max' => 255]),
        ];
    }
}
