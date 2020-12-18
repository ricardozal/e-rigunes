<?php


namespace App\Http\Request;


use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'father_last_name' => 'required',
            'mother_last_name' => 'required',
            'email' => ['required', 'email', 'unique:user'],
            'password' => 'required|confirmed',
            'phone' => 'required',
            'birthday' => 'required'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Nombre necesario',
            'father_last_name.required' => 'Apellido paterno necesario',
            'mother_last_name.required' => 'Apellido materno necesario',
            'email.required' => 'Correo electrónico necesario',
            'email.unique' => 'El correo ya está registrado',
            'email.email' => 'Ingrese un correo electrónico',
            'password.required' => 'Contraseña necesaria',
            'password.confirmed' => 'Las contraseñas deben coincidir',
            'phone.required' => 'Debe ingresar un número de teléfono',
            'birthday.required' => 'Debe ingresar la fecha de nacimiento'
        ];
    }
}

