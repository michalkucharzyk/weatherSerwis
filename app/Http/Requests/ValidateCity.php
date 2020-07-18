<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateCity extends FormRequest
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
            'city' => 'required|max:50',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'city.required' => __('validation.city_required'),
            'city.max' =>  __('validation.city_max_length',['count'=> 50]),
        ];
    }
}
