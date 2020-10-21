<?php


namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateProviderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        $providerId = $this->route('providerId');

        return [
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('provider', 'email')->ignore($providerId)],
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
