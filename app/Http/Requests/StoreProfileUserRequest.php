<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileUserRequest extends FormRequest
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
            'id_user' => 'required',
            'fullname' => 'required',
            'address' => 'required',
            'no_phone' => 'required',
            'gender' => 'required',
            'statusdepartment' => 'required',
            'department' => 'required',
            'projectname' => 'required',
            'presendate' => 'required',
            'typeproject' => 'required',
            'objectiveproject' => 'required',
        ];
    }
}
