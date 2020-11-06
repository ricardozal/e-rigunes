<?php


namespace App\Http\Request;


use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules(){
        return [
            'name' => 'required',
            'email' => ['required', 'email'],
            'phone' => 'required',
            'message' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nombre necesario',
            'email.required' => 'Correo electrónico necesario',
            'email.email' => 'Ingrese un correo electrónico',
            'phone.required' => 'Mensaje necesario',
            'message.required' => 'Mensaje necesario'
        ];
    }
}
