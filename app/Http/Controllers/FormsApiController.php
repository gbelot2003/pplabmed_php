<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Firma;
use App\Gravidad;
use Illuminate\Http\Request;

class FormsApiController extends Controller
{
    public function citologiaFormData()
    {
        $gravi = Gravidad::select('name as label', 'id as value')->get();
        $idcito = Categoria::select('name as label', 'id as value')->get();
        $firmas = Firma::select('name as label', 'id as value')->get();
        return $item = ([
            'gravidad' => $gravi,
            'idcito' => $idcito,
            'firmas' => $firmas
        ]);
    }
}
