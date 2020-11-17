<?php


namespace App\Http\Request;


use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'street' => 'required',
            'ext_num' => 'required',
            'zip_code' => 'required|numeric',
            'colony' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'references'=>'required'


        ];
    }

    public function messages()
    {
        return [
            'street.required' => 'El nombre de la calle es requerido',
            'ext_num.required' => 'El número exterior es requerido',
            'zip_code.required' => 'El código postal es requerido',
            'zip_code.numeric' => 'El código postal debe ser numérico',
            'colony.required' => 'El nombre de la colonia es requerido',
            'city.required' => 'El nombre de la ciudad es requerido',
            'state.required' => 'El nombre del estado es requerido',
            'country.required' => 'El nombre del país es requrido',
            'references.required'=>'Referencia requerida'

        ];
    }
}
