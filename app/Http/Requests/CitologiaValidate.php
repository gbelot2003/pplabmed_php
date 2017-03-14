<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitologiaValidate extends FormRequest
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

        $postId = $this->route()->parameter('citologia');

        return  $edit =
                [
                    'serial' => 'numeric|unique:citologias,serial,' .$postId,
                    'factura_id' => 'numeric|required|unique:citologias,factura_id,' .$postId,
                    'nombre_completo_cliente' => 'required|string',
                    'edad' => 'required',
                    'sexo' => 'string|max:1',
                    'correo' => 'email',
                    'correo2' => 'string|nullable',
                    'direccion_entrega_sede' => 'string',
                    'medico' => 'string',
                    'deteccion_cancer' => 'boolean',
                    'indice_maduracion' => 'boolean',
                    'otros_a' => 'nullable',
                    'gravidad_id' => 'integer|required',
                    'icitologia_id' => 'integer|required',
                    'para' => 'integer|nullable',
                    'abortos' => 'integer|nullable',
                    'fur' => 'date|required',
                    'fup' => 'date|required',
                    'fecha_informe' => 'date|required',
                    'fecha_muestra' => 'date|required',
                    'firma_id' => 'required|integer',
                    'firma2_id' => 'integer|nullable',
                    'otros_b' => 'string|nullable',
                    'mm' => 'boolean',
                    'diagnostico_clinico' => 'string|required'
                ];

    }
}