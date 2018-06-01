<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Citologia;
use App\CitologiasEng;
use App\Firma;
use Atlas\Helpers\DateHelper;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\TranslateClient as GoogleTranslate;

class CitologiasEngController extends Controller
{
    public $flag;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ManageCito');
    }

    public function editOrCreate($serial)
    {
        $cito = Citologia::where('serial', $serial)->first();

        $idCIto = Categoria::where('status', 1)->pluck('name', 'id');
        $firmas = Firma::where('status', 1)->pluck('name', 'id');

        $citoEng = CitologiasEng::where('serial', $serial)->first();


        if (count($citoEng) > 0) {

            $item = $citoEng;

            return View('resultados.citologia.eng.edit', compact('item', 'idCIto', 'firmas'));

        } else {
            $translator = new GoogleTranslate();

            if ($cito->diagnostico) {
                $diagnostico = $translator->setSource('es')
                    ->setTarget('en')
                    ->translate($cito->diagnostico);
            } else {
                $diagnostico = null;
            }

            if ($cito->informe) {
                $informe = $translator->setSource('es')
                    ->setTarget('en')
                    ->translate($cito->informe);
            } else {
                $informe = null;
            }

            if ($cito->otros_b != null) {
                $otros = $translator->setSource('es')
                    ->setTarget('en')
                    ->translate($cito->otros_b);
            } else {
                $otros = null;
            }


            $item = CitologiasEng::create([
                'serial' => $cito->serial,
                'factura_id' => $cito->factura_id,
                'deteccion_cancer' => $cito->deteccion_cancer,
                'indice_maduracion' => $cito->indice_maduracion,
                'otros_a' => $cito->otros_a,
                'gravidad' => $cito->gravidad,
                'fur' => $cito->fur,
                'fup' => $cito->fup,
                'fecha_informe' => $cito->fecha_informe,
                'fecha_muestra' => $cito->fecha_muestra,
                'para' => $cito->para,
                'abortos' => $cito->abortos,
                'icitologia_id' => $cito->icitologia_id,
                'firma_id' => $cito->firma_id,
                'firma2_id' => $cito->firma2_id,
                'otros_b' => $otros,
                'mm' => $cito->mm,
                'diagnostico' => $diagnostico,
                'informe' => $informe
            ]);


            return View('resultados.citologia.eng.edit', compact('item', 'idCIto', 'firmas'));

        }

    }

    public function updateTrans(Request $request, $serial)
    {
        $citoEng = CitologiasEng::where('serial', $serial)->first();

        $citoEng->deteccion_cancer = isset($request['deteccion_cancer']) ? $request['deteccion_cancer'] = 1 : $request['deteccion_cancer'] = 0;
        $citoEng->indice_maduracion = isset($request['indice_maduracion']) ? $request['indice_maduracion'] = 1 : $request['indice_maduracion'] = 0;
        $citoEng->mm = isset($request['mm']) ? $request['mm'] = 1 : $request['mm'] = 0;

        if ($request->has('fur')) {
            $fecha_nac = new DateHelper($request->get('fur'));
            $request['fur'] = $fecha_nac->getDate();
        }

        if ($request->has('fup')) {
            $fecha_nac = new DateHelper($request->get('fup'));
            $request['fup'] = $fecha_nac->getDate();
        }

        if ($request->has('fecha_muestra')) {
            $fecha_nac = new DateHelper($request->get('fecha_muestra'));
            $request['fecha_muestra'] = $fecha_nac->getDate();
        }

        if ($request->has('fecha_informe')) {
            $fecha_nac = new DateHelper($request->get('fecha_informe'));
            $request['fecha_informe'] = $fecha_nac->getDate();
        }

        if ($request->has('firma2_id')) {
            $val = $request->get('firma2_id');
            if ($val === 'none') {
                $request['firma2_id'] = null;
            }
        }

        $citoEng->update($request->all());


        flash('Registro Creado', 'success')->important();

        return redirect()->to(action('CitologiasEngController@editOrCreate', $citoEng->serial));

    }

}
