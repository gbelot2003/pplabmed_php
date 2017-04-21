<?php

namespace App\Http\Controllers;

use App\CitoSerial;
use App\CitoUnbind;
use App\Firma;
use App\Histopatologia;
use App\Http\Requests\HistopatiaValidation;
use App\LinkImage;
use App\Plantilla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class HistopatologiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('showHisto', ['only' => ['index']]);
        $this->middleware('createHito', ['only' => ['create', 'store']]);
        $this->middleware('editarFirma', ['only' => ['edit', 'update']]);
    }

    public function index()
    {
        $serial = CitoSerial::findOrFail(2);
        return View('resultados.histopatologia.index', compact('serial'));
    }


    public function create()
    {
        $serial = 'N/A';
        $link = LinkImage::create([
            'user_id' => Auth::user()->id
        ]);
        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        $plantillas = Plantilla::all();
        return View('resultados.histopatologia.create', compact('serial', 'firmas', 'plantillas', 'link'));
    }

    public function store(HistopatiaValidation $request)
    {
        $request['serial'] = $this->getSerial();
        $histo = Histopatologia::create($request->all());
        $histo->facturas->update($request->all());
        $this->setSerial($request->input('serial'));

        flash('Reegistro Creado', 'success')->important();
        return redirect()->action('HistopatologiaController@create');
    }

    public function edit($id)
    {
        $item = Histopatologia::findOrFail($id);
        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        $plantillas = Plantilla::all();
        $i = 0;
        $previous = Histopatologia::where('id', '<', $item->id)->max('id');
        $next = Histopatologia::where('id', '>', $item->id)->min('id');
        $total = Histopatologia::all()->count();
        return View('resultados.histopatologia.edit', compact('item', 'plantillas', 'firmas', 'postId', 'i', 'previous', 'next', 'total'));
    }

    public function update(HistopatiaValidation $request, $id)
    {
        $item = Histopatologia::findOrFail($id);
        $item->update($request->all());
        $item->facturas->update($request->all());

        flash('Reegistro Actualizado', 'success')->important();
        return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchPage()
    {
        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        return View('resultados.histopatologia.search_page', compact('firmas'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processForm(Request $request)
    {
        //dd($request->all());
        $request->get('serial') ? $serial = $request->get('serial'): $serial = 'null';
        $request->get('factura_id') ? $factura_id = $request->get('factura_id'): $factura_id = 'null';
        $request->get('nombre_completo_cliente') ? $nombre = $request->get('nombre_completo_cliente'): $nombre = 'null';
        $request->get('edad') ? $edad = $request->get('edad'): $edad = 'null';
        $request->get('sexo') ? $sexo = $request->get('sexo'): $sexo = 'null';
        $request->get('correo') ? $correo = $request->get('correo'): $correo = 'null';
        $request->get('correo2') ? $correo2 = $request->get('correo2'): $correo2 = 'null';
        $request->get('direccion_entrega_sede') ? $direccion = $request->get('direccion_entrega_sede'): $direccion = 'null';
        $request->get('medico') ? $medico = $request->get('medico'): $medico = 'null';

        $request->get('topog') ? $topo = $request->get('topog'): $topo = 'null';
        $request->get('mor1') ? $mor1 = $request->get('mor1'): $mor1 = 'null';
        $request->get('mor2') ? $mor2 = $request->get('mor2'): $mor2 = 'null';
        $request->get('firma_id') ? $firma = $request->get('firma_id'): $firma = 'null';
        $request->get('firma2_id') ? $firma2 = $request->get('firma2_id'): $firma2 = 'null';
        $request->get('diagnostico') ? $diag = $request->get('diagnostico'): $diag = 'null';
        $request->get('muestra') ? $muestra = $request->get('muestra'): $muestra = 'null';
        $request->get('fecha_informe') ? $finfo = $request->get('fecha_informe'): $finfo = 'null';
        $request->get('fecha_biopcia') ? $fbiop = $request->get('fecha_biopcia'): $fbiop = 'null';
        $request->get('fecha_muestra') ? $fmuest = $request->get('fecha_muestra'): $fmuest = 'null';
        $request->get('informe') ? $informe = $request->get('informe'): $informe = 'null';

        $url = 'histopatologias/resultados/'.$serial.'/'.$factura_id.'/'.$nombre.'/'.$edad.'/'.$sexo.'/'.$correo.'/'.$correo2.'/'.$direccion.'/'.$medico;
        $url .= '/'.$topo.'/'.$mor1.'/'.$mor2.'/'.$firma.'/'.$firma2.'/'.$diag.'/'.$muestra.'/'.$finfo.'/'.$fbiop.'/'.$fmuest.'/'.$informe;
        return redirect()->to($url);
    }

    /**
     * @param $inicio
     * @param $fin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search($serial, $factura_id, $nombre, $edad, $sexo, $correo, $correo2, $direccion, $medico, $topo, $mor1, $mor2, $firma, $firma2, $diag, $muestra, $finfo, $fbiop, $fmuest, $informe)
    {
        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        $plantillas = Plantilla::all();


        $query = Histopatologia::with('facturas');

        if($serial != 'null'){
            $query->where('serial', $serial);
        }

        if($factura_id != 'null'){
            $query->where('factura_id', $factura_id);
        }

        if($nombre != 'null'){
            $query->whereHas('facturas', function($q) use ($nombre){
                $q->Where('nombre_completo_cliente', 'like', '%' . $nombre . '%');
            });
        }

        if($edad != 'null'){
            $query->whereHas('facturas', function($q) use ($edad){
                $q->where('edad', $edad);
            });
        }

        if($sexo != 'null'){
            $query->whereHas('facturas', function($q) use ($sexo){
                $q->where('sexo', $sexo);
            });
        }

        if($correo != 'null'){
            $query->whereHas('facturas', function($q) use ($correo){
                $q->where('correo', 'like', '%' . $correo . '%');
            });
        }

        if($correo2 != 'null'){
            $query->whereHas('facturas', function($q) use ($correo2){
                $q->where('correo2', 'like', '%' . $correo2 . '%');
            });
        }

        if($direccion != 'null'){
            $query->whereHas('facturas', function($q) use ($direccion){
                $q->where('direccion_entrega_sede', 'like', '%' . $direccion . '%');
            });
        }


        if($medico != 'null'){
            $query->whereHas('facturas', function($q) use ($medico){
                $q->where('medico', 'like', '%' . $medico . '%');
            });
        }

        if($topo != 'null'){
            $query->whereHas('facturas', function($q) use ($topo){
                $q->where('topog', $topo);
            });
        }

        if($mor1 != 'null'){
            $query->whereHas('facturas', function($q) use ($mor1){
                $q->where('mor1', $mor1);
            });
        }

        if($mor2 != 'null'){
            $query->whereHas('facturas', function($q) use ($mor2){
                $q->where('mor2', $mor2);
            });
        }

        if($firma != 'null'){
            $query->whereHas('facturas', function($q) use ($firma){
                $q->where('firma_id', $firma);
            });
        }
        if($firma2 != 'null'){
            $query->whereHas('facturas', function($q) use ($firma2){
                $q->where('firma2_id', $firma2);
            });
        }

        if($diag != 'null'){
            $query->whereHas('facturas', function($q) use ($diag){
                $q->where('diagnostico', 'like', '%' . $diag . '%');
            });
        }


        if($muestra != 'null'){
            $query->whereHas('facturas', function($q) use ($muestra){
                $q->where('muestra', $muestra);
            });
        }

        if($finfo != 'null'){
            $query->whereHas('facturas', function($q) use ($finfo){
                $q->where('fecha_informe', $finfo);
            });
        }

        if($fbiop != 'null'){
            $query->whereHas('facturas', function($q) use ($fbiop){
                $q->where('fecha_biopcia', $fbiop);
            });
        }

        if($fmuest != 'null'){
            $query->whereHas('facturas', function($q) use ($fmuest){
                $q->where('fecha_muestra', $fmuest);
            });
        }

        if($informe != 'null'){
            $query->whereHas('facturas', function($q) use ($informe){
                $q->where('informe', 'like', '%' . $informe . '%');
            });
        }

        $items = $query->paginate(1);
        $i = 0;
        return View('resultados.histopatologia.search_results', compact('items', 'firmas', 'plantillas', 'i'));

    }

    public function listados()
    {
        $items = Histopatologia::select([
            'histopatologias.id',
            'histopatologias.serial',
            'histopatologias.factura_id',
            'facturas.nombre_completo_cliente',
            'firmas.name',
            'histopatologias.created_at'
        ])
            ->Join('facturas', 'factura_id', '=', 'facturas.num_factura')
            ->Join('firmas', 'firma_id', '=', 'firmas.id');

        return Datatables::of($items)
            ->addColumn('href', function($items){
                return '<a href="histopatologia/'. $items->id .'/edit" class="btn btn-xs btn-primary">Ver Detalle</a>';
            })
            ->rawColumns(['href'])
            ->make(true);
    }

    /**
     * @param $req
     */
    public function setSerial($req)
    {

        $preserial = CitoSerial::findOrFail(2);
        $serial = ($preserial->serial + 1);

        if($serial != $req){
            $getSerial = CitoUnbind::where('unbind', $req)->first();
            $getSerial->delete();
        } else {
            $getSerial = CitoSerial::findOrFail(2);
            $getSerial->serial = $req;
            $getSerial->update();
        }
    }
    /**
     * @return mixed
     */
    public function getSerial()
    {
        $getSerial = CitoSerial::findOrFail(2);
        $sserial = $getSerial->serial;
        $serial = ($sserial + 1);
        return $serial;
    }
}
