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
                    'serial' => 'numeric|unique:citologias,serial,' .$postId,
                    'factura_id' => 'numeric|required',
                    'nombre_completo_cliente' => 'string|nullable',
                    'edad' => 'string|nullable',
                    'sexo' => 'string|max:1|nullable',
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
                    'fur' => 'string|nullable',
                    'fup' => 'string|nullable',
                    'fecha_informe' => 'string|required',
                    'fecha_muestra' => 'string|nullable',
                    'firma_id' => 'required|integer',
                    'firma2_id' => 'nullable',
                    'otros_b' => 'string|nullable',
                    'mm' => 'boolean',
                    'diagnostico' => 'string|nullable',
                    'informe' => 'string|nullable',
                ];

    }
}
