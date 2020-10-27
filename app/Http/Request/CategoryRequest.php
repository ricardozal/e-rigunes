<?php


namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;


class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'image_url' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nombre necesario',
            'description.required' => 'Descripción de categoría necesaria',
            'image_url.required' => 'URL de imagen necesaria'
        ];
    }
}
