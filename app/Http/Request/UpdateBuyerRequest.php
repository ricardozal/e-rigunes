<?php
/**
 * Created by PhpStorm.
 * User: Satoritech
 * Date: 3/9/2020
 * Time: 12:40 PM
 */

namespace App\Http\Request;


use Illuminate\Foundation\Http\FormRequest;

class UpdateBuyerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            'email' => 'required|email',
            'phone'=>'required'
        ];
    }

    public function messages()
    {
        return [

            'email.required' => 'El correo del usuario es requerido.',
            'phone.required'=>"Telefono requerido"
        ];
    }
}
