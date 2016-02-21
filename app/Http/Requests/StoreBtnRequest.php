<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreBtnRequest extends Request
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
            'first_name'    => 'required',
            'last_name'     => 'required',
            'btn'           => 'required|min:8|max:12',
            'mrn'           => 'required|unique:records',
            'gender'        => 'required',
            'date_of_birth' => 'required',
            'call_notes'    => 'required',
        ];
    }

    public function messages()
    {
        return [
            'btn.required'  => 'Please provide btn/Phone Number',
            'btn.min'       => 'Minimum btn/Phone Number is 8',
            'btn.max'       => 'Maximum btn/Phone Number is 12',
            'date_of_birth' => 'Please provide Date of Birth',
            'call_notes'    => 'Please provide Call Notes',
            'first_name.required' => 'Please provide Patient\'s First name',
            'last_name.required' => 'Please provide Patient\'s Last name',
            'mrn.required'  => 'Medical Record Number is missing',
            'mrn.unique'    => 'Medical Record Number is already existing',
            'gender.required' => 'Please provide the patient\'s gender',
        ];
    }
}
