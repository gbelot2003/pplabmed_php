<?php

namespace App\Http\Controllers;

use App\CitoSerial;
use App\CitoUnbind;
use App\Factura;
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
        $serial = $this->getSerial();
        $link = LinkImage::create([
            'user_id' => Auth::user()->id
        ]);
        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        $plantillas = Plantilla::all();
        return View('resultados.histopatologia.create', compact('serial', 'firmas', 'plantillas', 'link'));
    }

    public function store(HistopatiaValidation $request)
    {
        //dd($request->all());
        $histo = Histopatologia::create($request->all());
        $histo->facturas->update($request->all());
        $this->setSerial($request->input('serial'));

        flash('Reegistro Creado', 'success')->important();
        return redirect()->action('HistopatologiaController@index');
    }

    public function edit($id)
    {
        $item = Histopatologia::findOrFail($id);
        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        $plantillas = Plantilla::all();
        return View('resultados.histopatologia.edit', compact('item', 'plantillas', 'firmas', 'postId'));
    }

    public function update(HistopatiaValidation $request, $id)
    {
        $item = Histopatologia::findOrFail($id);
        $item->update($request->all());
        $item->facturas->update($request->all());

        flash('Reegistro Actualizado', 'success')->important();
        return redirect()->action('HistopatologiaController@index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processForm(Request $request)
    {
        $inicio = $request->input('inicio');
        $fin = $request->input('fin');

        return redirect()->to('/histopatologia/resultados/'.$inicio.'/'.$fin);
    }

    /**
     * @param $inicio
     * @param $fin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search($inicio, $fin)
    {
        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        $bdate =  Carbon::createFromFormat('Y-m-d', $inicio)->startOfDay();
        $edate =  Carbon::createFromFormat('Y-m-d', $fin)->endOfDay();

        $query = Histopatologia::whereBetween('created_at', [$bdate, $edate]);
        $items = $query->paginate(1);

        return View('resultados.histopatologia.search_results', compact('items', 'firmas'));

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
