<?php


namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateBuyerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        $buyerId = $this->route('buyerId');

        return [
            'name' => 'required',
            'father_last_name' => 'required',
            'mother_last_name' => 'required',
            'birthday' => 'required',
            'phone' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es necesario',
            'father_last_name.required' => 'El apellido paterno es necesario',
            'mother_last_name.required' => 'El apellido materno es necesario',
            'birthday.required' => 'La fecha de naciemiento es requerida',
            'phone.required' => 'El Teléfono es necesario'
        ];
    }
}
