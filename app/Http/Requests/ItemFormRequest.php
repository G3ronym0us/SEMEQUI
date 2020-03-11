<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cod_item'=>'required',
            'nom_item'=>'required|max:50',
            'costo_item'=>'required|max:100',
            'servicio'=>'required',
            'activo'=>'required'
        ];
    }
}
