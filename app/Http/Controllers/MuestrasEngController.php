<?php

namespace App\Http\Controllers;

use App\MuestrasEng;
use Illuminate\Http\Request;
use Dedicated\GoogleTranslate;

class MuestrasEngController extends Controller
{

    //Pasamos el id de muestras, y revisamios contra muestra_id
    public function editOrCreate($id)
    {

        $muestraEng = MuestrasEng::where('muestra_id', $id)->first();

        if(count($muestraEng) > 0)
        {

            return 'existe';
        } else {

            $translator = new GoogleTranslate\Translator();
            
            return 'No existe';
        }

    }
}
