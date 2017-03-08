<?php

namespace App\Http\Controllers;

use App\Factura;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{

    public function readFiles()
    {
        $path = env('XML_PATH');
        $back = env('XML_BACK');
        $files = Storage::disk('hd')->allFiles();
        $i = 0;

        foreach ($files as $file)
        {

            $xml = @simplexml_load_file($path . $file);
            if($xml === false){

            } else {
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

                $new_path = $back . $file;
                $old_path = $path . $file;
                rename($old_path, $new_path);
                $i++;
            }

        }

        return redirect()->to(action('FacturasController@index'));

    }
}
