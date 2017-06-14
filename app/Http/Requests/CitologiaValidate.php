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

        return  $rules =
                [
                    'serial' => 'numeric|unique:Citologias,serial,' .$postId,
                    'factura_id' => 'numeric|required|unique:Citologias,factura_id,' .$postId,
                    'nombre_completo_cliente' => 'string|required',
                    'edad' => 'string|required',
                    'sexo' => 'string|max:1|required',
                    'correo' => 'string|nullable',
                    'correo2' => 'string|nullable',
                    'direccion_entrega_sede' => 'string|nullable',
                    'medico' => 'string|nullable',
                    'deteccion_cancer' => 'boolean',
                    'indice_maduracion' => 'boolean',
                    'otros_a' => 'nullable',
                    'gravidad' => 'integer|nullable',
                    'icitologia_id' => 'integer|required',
                    'para' => 'integer|nullable',
                    'abortos' => 'integer|nullable',
                    'fur' => 'date|nullable',
                    'fup' => 'date|nullable',
                    'fecha_informe' => 'date|nullable',
                    'fecha_muestra' => 'date|nullable',
                    'firma_id' => 'required|integer',
                    'firma2_id' => 'integer|nullable',
                    'otros_b' => 'string|nullable',
                    'mm' => 'boolean',
                    'diagnostico' => 'string|nullable',
                    'informe' => 'string|nullable',
                ];

    }
}
