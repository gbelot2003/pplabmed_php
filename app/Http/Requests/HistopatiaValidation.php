<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class HistopatiaValidation extends FormRequest
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
    public function rules(Request $request)
    {

        return [
            'serial' => 'numeric|unique:histopatologias,serial,' .$request->get('id'),
            'factura_id' => 'numeric|required|unique:histopatologias,factura_id,' .$request->get('id'),
            'nombre_completo_cliente' => 'string',
            'edad' => 'nullable',
            'sexo' => 'string|max:1',
            'correo' => 'string|nullable',
            'correo2' => 'string|nullable',
            'direccion_entrega_sede' => 'string|nullable',
            'medico' => 'string|nullable',
            'topog' => 'string|nullable',
            'mor1' => 'string|nullable',
            'mor2' => 'string|nullable',
            'firma_id' => 'required|integer',
            'firma2_id' => 'integer|nullable',
            'diagnostico' => 'string|nullable',
            'muestra' => 'string|nullable',
            'fecha_biopcia' => 'date|required',
            'fecha_informe' => 'date|nullable',
            'fecha_muestra' => 'date|nullable',
            'informe' => 'string|nullable',
            'muestra_entrega' => 'boolean',
        ];
    }
}
