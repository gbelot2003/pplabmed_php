<?php

namespace App\Http\Controllers;

use Acme\Helpers\SerialHelper;
use App\Audit;
use App\Events\UpdateHistopatologia;
use App\Histopatologia;
use App\Http\Requests\HistopatiaValidation;
use Atlas\Helpers\DateHelper;
use Illuminate\Support\Facades\Auth;


class HistopatologiaApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ManageHisto');
    }


    public function store(HistopatiaValidation $request)
    {
        $serialHelper = new SerialHelper();
        $request['serial'] = $serialHelper->getSerial(2);

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

        $histo = Histopatologia::create($request->all());
        $histo->facturas->update($request->all());
        $serialHelper->setSerial($request->input('serial'), 2);

        Audit::create([
            'title' => 'Biopsias',
            'action' => 'creación',
            'details' => $histo->serial . ' - Factura ' . $histo->facturas->num_factura,
            'user_id' => Auth::user()->id
        ]);

        return $histo;
    }

    public function update(HistopatiaValidation $request, $id)
    {
        //dd($request->all());
        $item = Histopatologia::findOrFail($id);
        $item->locked_at = false;
        $item->locked_user = null;
        $user = Auth::user();

        $item->muestra_entrega = isset($request['muestra_entrega']) ? $request['muestra_entrega'] = 1 : $request['muestra_entrega'] = 0;
        if ($request->has('informe')) {
            html_entity_decode($request->get('informe'));
        }

        if ($request->has('fecha_biopcia')) {
            $fecha = new DateHelper($request->get('fecha_biopcia'));
            $request['fecha_biopcia'] = $fecha->getDate();
        }

        if ($request->has('fecha_muestra')) {
            $fecha = new DateHelper($request->get('fecha_muestra'));
            $request['fecha_muestra'] = $fecha->getDate();
        }

        if ($request->has('fecha_informe')) {
            $fecha = new DateHelper($request->get('fecha_informe'));
            $request['fecha_informe'] = $fecha->getDate();
        }

        if ($request->has('firma2_id')) {
            $val = $request->get('firma2_id');
            if ($val === 'none') {
                $request['firma2_id'] = null;
            }
        }

        $item->update($request->all());

        Audit::create([
            'title' => 'Biopsias',
            'action' => 'edición',
            'details' => $item->serial . ' - Factura ' . $item->facturas->num_factura,
            'user_id' => Auth::user()->id
        ]);

        event(new UpdateHistopatologia($item, $user));
        //flash('Registro Actualizado', 'success')->important();
        return $item; //redirect()->to(action('HistopatologiaController@edit', $item->serial));
    }
}
