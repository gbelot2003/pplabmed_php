<?php

namespace App\Http\Controllers;

use Acme\Helpers\SerialHelper;
use App\CitoSerial;
use App\CitoUnbind;
use App\Firma;
use App\Histopatologia;
use App\Http\Requests\HistopatiaValidation;
use App\LinkImage;
use App\Plantilla;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class HistopatologiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ManageHisto');
    }

    public function index()
    {
        $serial = CitoSerial::findOrFail(2);
        return View('resultados.histopatologia.index', compact('serial'));
    }


    public function create()
    {
        $serialHelper = new SerialHelper();
        $serial = $serialHelper->getSerial(2);
        $link = LinkImage::create([
            'user_id' => Auth::user()->id
        ]);

        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        $plantillas = Plantilla::all();
        return View('resultados.histopatologia.create', compact('serial', 'firmas', 'plantillas', 'link'));
    }

    public function store(HistopatiaValidation $request)
    {
        $serialHelper = new SerialHelper();
        $request['serial'] = $serialHelper->getSerial(2);


        $histo = Histopatologia::create($request->all());
        $histo->facturas->update($request->all());
        $serialHelper->setSerial($request->input('serial'), 2);

        flash('Reegistro Creado', 'success')->important();
        return redirect()->to(action('HistopatologiaController@edit', $histo->id));
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

        $now = date("Y-m-d");
        $bdate = Carbon::createFromFormat('Y-m-d', $now)->startOfDay();
        $edate = Carbon::createFromFormat('Y-m-d', $now)->endOfDay();

        $today = Histopatologia::whereBetween('created_at', [$bdate, $edate])->count();

        return View('resultados.histopatologia.edit', compact('item', 'plantillas', 'firmas', 'postId', 'i', 'previous', 'next', 'total', 'today'));
    }

    public function update(HistopatiaValidation $request, $id)
    {
        $item = Histopatologia::findOrFail($id);
        $item->muestra_entrega = isset($request['muestra_entrega']) ? $request['muestra_entrega'] = 1 : $request['muestra_entrega'] = 0;
        if ($request->has('informe'))
        {
            html_entity_decode($request->get('informe'));
        }

        $item->update($request->all());
        $item->facturas->update($request->all());

        flash('Registro Actualizado', 'success')->important();
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
     * @param $serial
     * @param $factura_id
     * @param $nombre
     * @param $edad
     * @param $sexo
     * @param $correo
     * @param $correo2
     * @param $direccion
     * @param $medico
     * @param $topo
     * @param $mor1
     * @param $mor2
     * @param $firma
     * @param $firma2
     * @param $diag
     * @param $muestra
     * @param $finfo
     * @param $fbiop
     * @param $fmuest
     * @param $informe
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param $inicio
     * @internal param $fin
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
            $query->where('topog', $topo);
        }

        if($mor1 != 'null'){
            $query->where('mor1', $mor1);
        }

        if($mor2 != 'null'){
            $query->where('mor2', $mor2);
        }

        if($firma != 'null'){
            $query->where('firma_id', $firma);
        }
        if($firma2 != 'null'){
            $query->where('firma2_id', $firma2);
        }

        if($diag != 'null'){
            $query->where('diagnostico', 'like', '%' . $diag . '%');
        }


        if($muestra != 'null') {
            $query->where('muestra', $muestra);
        }

        if($finfo != 'null'){
            $query->where('fecha_informe', $finfo);
        }

        if($fbiop != 'null') {
            $query->where('fecha_biopcia', $fbiop);
        }

        if($fmuest != 'null'){
            $query->where('fecha_muestra', $fmuest);
        }

        if($informe != 'null') {
            $query->where('informe', 'like', '%' . $informe . '%');
        }

        $items = $query->paginate(1);
        $i = 0;
        return View('resultados.histopatologia.search_results', compact('items', 'firmas', 'plantillas', 'i'));

    }

    /**
     * @return mixed
     */
    public function listados()
    {
        $items = Histopatologia::select([
            'histopatologias.id',
            'histopatologias.serial',
            'histopatologias.factura_id',
            'facturas.nombre_completo_cliente',
            'facturas.medico',
            'firmas.name',
            'histopatologias.created_at',
            'histopatologias.fecha_informe'
        ])
            ->Join('facturas', 'factura_id', '=', 'facturas.num_factura')
            ->Join('firmas', 'firma_id', '=', 'firmas.id');

        return Datatables::of($items)
            ->addColumn('href', function($items){
                return '<a href="histopatologia/'. $items->id .'/edit" class="btn btn-xs btn-primary">Ver Detalle</a>';
            })
            ->addColumn('finforme', function($items){
                return $items->fecha_informe->format('d/m/Y');
            })
            ->rawColumns(['href'])
            ->make(true);
    }
}
