<?php

namespace App\Http\Controllers;

use App\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\File;

class FilesController extends Controller
{


    public function readFiles()
    {
        $files = Storage::disk('hd')->allFiles();
        foreach ($files as $file)
        {
            $xml=simplexml_load_file('C:\\xml\\' . $file);
            $factura = Factura::create([
                'num_factura' => $xml->num_factura,
                'num_cedula' => $xml->num_cedula,
                'nombre_completo_cliente' => $xml->nombre_completo_cliente,
                'fecha_nacimiento' => date('Y-m-d H:i:s', strtotime($xml->fecha_nacimiento)),
                'correo' => $xml->correo,
                'direccion_entrega_sede' => $xml->direccion_entrega_sede,
                'medico' => $xml->medico,
                'status' => $xml->status,
                'sexo' => $xml->sexo,
            ]);
        }


    }
}
