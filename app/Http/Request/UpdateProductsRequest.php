<?php


namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateProductsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        $productId = $this->route('productId');

        return [
            'name' => 'required',
            'description' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'width' => 'required',
            'length' => 'required',
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
            'fk_id_provider' => 'Seleccione un proveedor',
            'fk_id_category' => 'Seleccione una categoria'
        ];
    }
}
