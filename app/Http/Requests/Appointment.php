<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Appointment extends FormRequest
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
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'postal' => 'required',
            'location' => 'required',
            'count' => 'min:1',
            'appdate' => 'required',
            'apptime' => 'required',
            'nr' => 'required'

        ];
    }
    public function messages()
    {
       return [
           'fname.required' => 'Vorname erforderlich',
           'lname.required' => 'Nachname erforderlich',
           'phone.required' => 'Tel erforderlich',
           'address.required' => 'Addresse erforderlich',
           'postal.required' => 'PLZ erforderlich',
           'location.required' => 'Standort erforderlich',
           'count.min' => 'Mindestens eine Person erforderlich',
           'appdate.required' => 'Termin dateum erforderlich',
           'apptime.required' => 'Termin zeit erforderlich',
           'nr.required' => 'Anzahl erforderlich'
       ];
    }
}
