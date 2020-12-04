<?php


namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;


class ProductsRequest extends FormRequest
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
            'weight' => 'required',
            'height' => 'required',
            'width' => 'required',
            'length' => 'required',
            'public_price' => 'required',
            'distributor_price' => 'required',
            'rigunes_price' => 'required',
            'fk_id_provider' => 'required',
            'fk_id_category' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name' => 'El nombre es necesario',
            'description' => 'La descripción es necesaria',
            'weight' => 'Peso necesario',
            'height' => 'Altura necesaria',
            'width' => 'Ancho necesario',
            'length' => 'Largo requerido',
            'public_price' => 'Precio público necesarío',
            'distributor_price' => 'Precio de distribuidor requerido',
            'rigunes_price' => 'Precio de rigunes requerido',
            'fk_id_provider' => 'Seleccione un proveedor',
            'fk_id_category' => 'Seleccione una categoria'
        ];
    }
}
