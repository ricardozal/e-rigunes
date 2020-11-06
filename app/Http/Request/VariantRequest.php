<?php


namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;


class VariantRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fk_id_size' => 'required',
            'fk_id_color' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'fk_id_size' => 'La talla es necesaria',
            'fk_id_color' => 'El color es requerido'
        ];
    }
}
