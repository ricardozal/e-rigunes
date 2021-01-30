<?php


namespace App\Http\Request;


use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'answer'=>'required',
        ];
    }

    public function messages(){
        return [
            'answer.required'=>'El mensaje es requerido'
        ];
    }
}
