<?php


namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;


class StatusExchangeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fk_id_exchange_status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'fk_id_exchange_status.required' => 'status necesario'
        ];
    }
}
