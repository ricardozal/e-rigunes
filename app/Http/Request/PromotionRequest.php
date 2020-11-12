<?php


namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;


class PromotionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'expiration_date' => 'required',
            'coupon_code' => 'required',
            'swaps' => 'required',
            'value' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'expiration_date.required' => 'Fecha de expiración necesaria',
            'coupon_code.required' => 'Código de cúpon requerido',
            'swaps.required' => 'Número de cambios requerido',
            'value.required' => 'Valor de la promoción necesario'
        ];
    }
}
