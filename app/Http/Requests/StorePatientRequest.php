<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'type'=>'required',
            'age'=>'required',
            'phone'=>'required',
            'nrc'=>'required',
            'gender'=>'required',
            'ethnicity'=>'required',
            'nationality'=>'required',
            'address'=>'required',
        ];
    }
}
