<?php


namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;


class ProviderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => ['required', 'email', 'unique:provider'],
            'phone' => 'required',
            'business_name' => 'required',
            'seller_name' => 'required',
            'seller_phone' => 'required',
            'seller_email' => ['required', 'email']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nombre necesario',
            'email.required' => 'Correo electrónico necesario',
            'email.unique' => 'El correo ya está registrado',
            'email.email' => 'Ingrese un correo electrónico',
            'phone.required' => 'Teléfono necesario',
            'business_name.required' => 'Marca necesaria',
            'seller_name.required' => 'Nombre de vendedor necesario',
            'seller_phone.required' => 'Teléfono de vendedor necesario',
            'seller_email.required' => 'Correo de vendedor necesario'
        ];
    }
}
