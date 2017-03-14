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
            'nombre_completo_cliente' => 'required|string',
            'edad' => 'required',
            'sexo' => 'string|max:1',
            'correo' => 'email',
            'correo2' => 'string|nullable',
            'direccion_entrega_sede' => 'string',
            'medico' => 'string',
            'topog' => 'string|required',
            'mor1' => 'string|required',
            'mor2' => 'string',
            'firma_id' => 'required|integer',
            'firma2_id' => 'integer|nullable',
            'diagnostico' => 'date|required',
            'muestra' => 'date|required',
            'fecha_informe' => 'date|required',
            'fecha_biopcia' => 'date|required',
            'fecha_muestra' => 'date|required',
            'informe' => 'string|required',
        ];
    }
}
