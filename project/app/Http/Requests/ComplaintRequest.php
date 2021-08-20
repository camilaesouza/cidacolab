<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComplaintRequest extends FormRequest
{
    public function __construct()
    {
        $this->registerCustomRules();
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|max:255',
            'description' => 'required|max:500',

            'address.type' => 'required|max:255',
            'address.cep' => [
                'required',
                'regex:/\d{5}-\d{3}/',
            ],

            'address.state' => 'required|exists:states,abbr',
            'address.number' => 'required|alpha_num',
            'address.city_id' => 'required|exists:cities,id',
            'address.district' => 'required|max:255',
            'address.street_avenue' => 'required|max:255',
            'address.complement'    => 'sometimes|max:255',

            'attachments' => 'required|array',
            'attachments.*' => 'required|validate_mime:png,jpg,jpeg',
        ];

        return $rules;
    }

    public function registerCustomRules()
    {
        \Validator::extend('validate_mime', function ($attribute, $value, $parameters, $validator) {
            $extension = $value->getClientOriginalExtension();
            return in_array($extension, $parameters);
        });
    }
}
