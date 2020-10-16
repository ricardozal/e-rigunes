<?php


namespace App\Http\Request;


use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email-login'=>'email|required',
            'password-login'=>'required',
        ];
    }

    public function messages(){
        return [
            'email-login.required'=>'El email es requerido, por favor',
            'email-login.email'=>'Ingrese un email valido, por favor',
            'password-login.required' => 'Debe ingresar su contraseña'
        ];
    }
}
