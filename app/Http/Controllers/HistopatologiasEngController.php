<?php

namespace App\Http\Controllers;

use App\Audit;
use App\Firma;
use App\Histopatologia;
use App\HistopatologiasEng;
use App\Plantilla;
use Atlas\Helpers\DateHelper;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\TranslateClient as GoogleTranslate;
use Illuminate\Support\Facades\Auth;

class HistopatologiasEngController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ManageHisto');
    }

    /**
     * @param $string
     * @return string
     */
    private function cleanText($string)
    {

        return trim(html_entity_decode($string, ENT_COMPAT, 'UTF-8'));
    }

    public function editOrCreate($id)
    {
        $histo = Histopatologia::where('id', $id)->first();
        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        $plantillas = Plantilla::where('type', 1)->get();
        $i = 0;

        $locked = false;
        $user = Auth::User();

        $histoEng = HistopatologiasEng::where('serial', $histo->serial)->first();

        if (count($histoEng) > 0) {

            $item = $histoEng;

            return View('resultados.histopatologia.eng.edit', compact('item', 'plantillas', 'firmas', 'postId', 'i', 'user', 'locked'));


        } else {
            $translator = new GoogleTranslate;
            $translator->setSource('es')
                ->setTarget('en');

            $histo->muestra_entrega = isset($request['muestra_entrega']) ? $request['muestra_entrega'] = 1 : $request['muestra_entrega'] = 0;

            if ($histo->diagnostico) {
                $diagnostico = $translator->translate($histo->diagnostico);

            } else {
                $diagnostico = null;
            }

            if ($histo->muestra) {
                $muestra = $translator->translate($histo->muestra);
            } else {
                $muestra = null;
            }

            if ($histo->informe) {

                $factor = $this->cleanText($histo->informe);
                $informe = $translator->translate($factor);

            } else {
                $informe = null;
            }


            //dd($informe);
            $item = HistopatologiasEng::create([
                'serial' => $histo->serial,
                'factura_id' => $histo->factura_id,
                'link_id' => $histo->link_id,
                'topog' => $histo->topog,
                'mor1' => $histo->mor1,
                'mor2' => $histo->mor2,
                'firma_id' => $histo->firma_id,
                'firma2_id' => $histo->firma2_id,
                'diagnostico' => $diagnostico,
                'muestra' => $muestra,
                'fecha_informe' => $histo->fecha_informe,
                'fecha_biopcia' => $histo->fecha_biopcia,
                'fecha_muestra' => $histo->fecha_muestra,
                'informe' => $informe,
            ]);

            return View('resultados.histopatologia.eng.edit', compact('item', 'plantillas', 'firmas', 'postId', 'i'));

        }
    }

    public function updateTrans(Request $request, $id)
    {
        //dd($request->all());

        $item = HistopatologiasEng::where('factura_id', $id)->first();

        $item->muestra_entrega = isset($request['muestra_entrega']) ? $request['muestra_entrega'] = 1 : $request['muestra_entrega'] = 0;

        if ($request->has('informe')) {
            html_entity_decode($request->get('informe'));
        }

        if ($request->has('fecha_biopcia')) {
            $fecha_nac = new DateHelper($request->get('fecha_biopcia'));
            $request['fecha_biopcia'] = $fecha_nac->getDate();
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

        $item->update($request->all());

        Audit::create([
            'title' => 'Biopsias Trans',
            'action' => 'edición',
            'details' => $item->serial . ' - Factura ' . $item->facturas->num_factura,
            'user_id' => Auth::user()->id
        ]);

        flash('Registro Actualizado', 'success')->important();
        return redirect()->to(action('HistopatologiasEngController@editOrCreate', $item->id));
    }


}
