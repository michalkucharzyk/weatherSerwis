<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUpdateCity extends FormRequest
{
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
        return [
            'city' => 'required|max:255',
            'id' => 'required|max:255',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'city.required' => 'A city is required',
            'city.max' => 'A city is max length 255 chart',
            'id.max' => 'A id city is required',
        ];
    }
}
