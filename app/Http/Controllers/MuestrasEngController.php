<?php

namespace App\Http\Controllers;

use App\Firma;
use App\Muestra;
use App\MuestrasEng;
use App\Plantilla;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\TranslateClient as GoogleTranslate;

class MuestrasEngController extends Controller
{
    function __construct()
    {
    }

    /**
     * @param $string
     * @return string
     */
    private function cleanText($string)
    {
        return trim(html_entity_decode($string, ENT_COMPAT, 'UTF-8'));
    }

    //Pasamos el id de muestras, y revisamios contra muestra_id
    public function editOrCreate($id)
    {

        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        $plantillas = Plantilla::where('type', 2)->where('status', 1)->get();

        $muestra = Muestra::findOrFail($id);

        $muestraEng = MuestrasEng::where('muestra_id', $id)->first();

        if(count($muestraEng) > 0)
        {
            $items = $muestraEng;


            return View('resultados.muestras.eng.edit', compact('items', 'plantillas', 'firmas'));

        } else {

            $translator = new GoogleTranslate();



            if ($muestra->body) {
                $factor = $this->cleanText($muestra->body);
                $body = $translator->setSource('es')
                    ->setTarget('en')
                    ->translate($factor);
            }

            $items = MuestrasEng::create([
                'serial' => $muestra->serial,
                'muestra_id' => $id,
                'firma_id' => $muestra->firma_id,
                'nombre' => $muestra->nombre,
                'body' => $body,
            ]);

            return View('resultados.muestras.eng.edit', compact('items', 'plantillas', 'firmas'));
        }

    }
}
