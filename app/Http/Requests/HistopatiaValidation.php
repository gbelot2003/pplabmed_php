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
            'nombre_completo_cliente' => 'string|required',
            'edad' => 'required',
            'sexo' => 'string|max:1|required',
            'correo' => 'string|nullable',
            'correo2' => 'string|nullable',
            'direccion_entrega_sede' => 'string|nullable',
            'medico' => 'string|nullable',
            'topog' => 'string|required',
            'mor1' => 'string|nullable',
            'mor2' => 'string|nullable',
            'firma_id' => 'required|integer',
            'firma2_id' => 'integer|nullable',
            'diagnostico' => 'string|nullable',
            'muestra' => 'string|nullable',
            'fecha_biopcia' => 'string|nullable',
            'fecha_informe' => 'string|required',
            'fecha_muestra' => 'string|nullable',
            'informe' => 'string|nullable',
            'muestra_entrega' => 'boolean',
        ];
    }
}
