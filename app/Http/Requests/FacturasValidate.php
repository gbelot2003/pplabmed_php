<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class FacturasValidate extends FormRequest
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
            'num_factura' => 'numeric|required',
            'num_cedula' => 'string|nullable',
            'nombre_completo_cliente' => 'required|string',
            'fecha_nacimiento' => 'string|nullable',
            'correo' => 'string|nullable',
            'correo2' => 'string|nullable',
            'direccion_entrega_sede' => 'string|nullable',
            'medico' => 'string|nullable',
            'status' => 'string|nullable',
            'sexo' => 'string|nullable'
        ];
    }
}
