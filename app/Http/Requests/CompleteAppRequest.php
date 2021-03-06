<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Response;


class CompleteAppRequest extends FormRequest
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
            'first_name' => 'required',
            'birthdate' => 'required',
            'last_name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            "first_name.required" => "First name field is required.",
            "birthdate.required" => "Birthday field is required.",
            "last_name.required" => "Last name field is required."
        ];
    }
}
