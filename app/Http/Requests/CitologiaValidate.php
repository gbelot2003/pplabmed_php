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
                    'serial' => 'numeric',
                    'factura_id' => 'numeric|required|exists:facturas,num_factura|unique:citologias,factura_id,' .$postId,
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
