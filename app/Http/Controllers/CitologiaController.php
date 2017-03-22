<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Citologia;
use App\CitoSerial;
use App\CitoUnbind;
use App\Firma;
use App\Http\Requests\CitologiaValidate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Yajra\Datatables\Datatables;

class
CitologiaController extends Controller
{
    public $flag;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('showCito', ['only' => ['index']]);
        $this->middleware('createCito', ['only' => ['create', 'store']]);
        $this->middleware('editCito', ['only' => ['edit', 'update']]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $serial = CitoSerial::findOrFail(1);
        return View('resultados.citologia.index', compact('serial'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $serial = $this->getSerial();
        $idCIto = Categoria::where('status', 1)->pluck('name', 'id');
        $firmas = Firma::where('status', 1)->pluck('name', 'id');

        return View('resultados.citologia.create', compact('idCIto', 'firmas', 'gravidad', 'serial'));
    }

    /**
     * @param CitologiaValidate $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CitologiaValidate $request)
    {
        $cito = Citologia::create($request->all());
        $cito->facturas->update($request->all());

        $this->setSerial($request->input('serial'));
        flash('Reegistro Creado', 'success')->important();
        return redirect()->action('CitologiaController@index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $item = Citologia::findOrFail($id);
        $idCIto = Categoria::where('status', 1)->pluck('name', 'id');
        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        return View('resultados.citologia.edit', compact('item','idCIto', 'firmas', 'gravidad'));
    }

    /**
     * @param CitologiaValidate $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CitologiaValidate $request, $id)
    {
        $cito = Citologia::findOrFail($id);
        $cito->mm = isset($request['deteccion_cancer']) ? $request['deteccion_cancer'] = 1 : $request['deteccion_cancer'] = 0;
        $cito->mm = isset($request['indice_maduracion']) ? $request['indice_maduracion'] = 1 : $request['indice_maduracion'] = 0;
        $cito->mm = isset($request['mm']) ? $request['mm'] = 1 : $request['mm'] = 0;
        $cito->update($request->all());
        $cito->facturas->update($request->all());

        flash('Reegistro Actualizado', 'success')->important();
        return redirect()->action('CitologiaController@index');
    }

    /**
     * @return mixed
     */
    public function getSerial()
    {
        $unbind = CitoUnbind::first();
        if($unbind){
            $serial =  $unbind->unbind;
        } else {
            $getSerial = CitoSerial::findOrFail(1);
            $sserial = $getSerial->serial;
            $serial = ($sserial + 1);
        }

        return $serial;
    }

    /**
     * @param $req
     */
    public function setSerial($req)
    {

        $preserial = CitoSerial::findOrFail(1);
        $serial = ($preserial->serial + 1);

        if($serial != $req){
            $getSerial = CitoUnbind::where('unbind', $req)->first();
            $getSerial->delete();
        } else {
            $getSerial = CitoSerial::findOrFail(1);
            $getSerial->serial = $req;
            $getSerial->update();
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processForm($string)
    {
        $yourvar = $string;
        dd($yourvar);

/*        $idCIto = Categoria::where('status', 1)->pluck('name', 'id');
        $firmas = Firma::where('status', 1)->pluck('name', 'id');

        $query = Citologia::with('facturas');

        if($request->get('serial')){
            $field = $request->get('serial');
            $query->where('serial', $field);
        }
        $request->get('serial') ? $serial = $request->get('serial'): $serial = 'null';

        if($request->get('factura_id')){
            $field = $request->get('factura_id');
            $query->where('factura_id', $field);
        }
        $request->get('serial') ? $serial = $request->get('serial'): $serial = 'null';


        if($request->get('nombre_completo_cliente') != 'null'){
            $field = $request->get('nombre_completo_cliente');
            $query->whereHas('facturas', function($q) use ($field){
                $q->Where('nombre_completo_cliente', 'like', '%' . $field . '%');
            });
        }
        $request->get('serial') ? $serial = $request->get('serial'): $serial = 'null';


        if($request->get('edad') != 'null'){
            $field = $request->get('edad');
            $query->whereHas('facturas', function($q) use ($field){
                $q->orWhere('edad', 'like', '%' . $field . '%');
            });
        }
        $request->get('serial') ? $serial = $request->get('serial'): $serial = 'null';


        if($request->get('sexo') != 'null'){
            $field = $request->get('sexo');
            $query->whereHas('facturas', function($q) use ($field){
                $q->orWhere('sexo', $field);
            });
        }
        $request->get('serial') ? $serial = $request->get('serial'): $serial = 'null';


        if($request->get('correo') != 'null'){
            $field = $request->get('correo');
            $query->whereHas('facturas', function($q) use ($field){
                $q->orWhere('correo', 'like', '%' . $field . '%');
            });
        }
        $request->get('serial') ? $serial = $request->get('serial'): $serial = 'null';


        if($request->get('correo2') != 'null'){
            $field = $request->get('correo2');
            $query->whereHas('facturas', function($q) use ($field){
                $q->orWhere('correo2', 'like', '%' . $field . '%');
            });
        }
        $request->get('serial') ? $serial = $request->get('serial'): $serial = 'null';


        if($request->get('direccion_entrega_sede') != 'null'){
            $field = $request->get('direccion_entrega_sede');
            $query->whereHas('facturas', function($q) use ($field){
                $q->orWhere('direccion_entrega_sede', 'like', '%' . $field . '%');
            });
        }
        $request->get('serial') ? $serial = $request->get('serial'): $serial = 'null';


        if($request->get('medico') != 'null'){
            $field = $request->get('medico');
            $query->whereHas('facturas', function($q) use ($field){
                $q->orWhere('medico', 'like', '%' . $field . '%');
            });
        }
        $request->get('serial') ? $serial = $request->get('serial'): $serial = 'null';


        $items = $query->paginate(1);
        return View('resultados.citologia.search_results', compact('items','idCIto', 'firmas'));*/
    }

    public function searchPage()
    {
        $idCito = Categoria::where('status', 1)->pluck('name', 'id');
        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        return View('resultados.citologia.search_page', compact('idCito', 'firmas'));
    }

    /**
     * @param Request $request
     */
    public function search($inicio, $fin, $idc = null)
    {
        $idCIto = Categoria::where('status', 1)->pluck('name', 'id');
        $firmas = Firma::where('status', 1)->pluck('name', 'id');

        $bdate =  Carbon::createFromFormat('Y-m-d', $inicio)->startOfDay();
        $edate =  Carbon::createFromFormat('Y-m-d', $fin)->endOfDay();

        $query = Citologia::whereBetween('created_at', [$bdate, $edate]);

        $items = $query->paginate(1);
        //return $items;
        return View('resultados.citologia.search_results', compact('items','idCIto', 'firmas', 'gravidad'));
    }

    public function listados()
    {
        $items = Citologia::select([
                'citologias.id',
                'citologias.serial',
                'citologias.factura_id',
                'facturas.nombre_completo_cliente',
                'categorias.name as citoId',
                'firmas.name',
                'citologias.created_at'
            ])
            ->Join('facturas', 'factura_id', '=', 'facturas.num_factura')
            ->Join('categorias', 'icitologia_id', '=', 'categorias.id')
            ->Join('firmas', 'firma_id', '=', 'firmas.id');

        return Datatables::of($items)
            ->addColumn('href', function($items){
                return '<a href="citologias/'. $items->id .'/edit" class="btn btn-xs btn-primary">Ver Detalle</a>';
            })
            ->rawColumns(['href'])
            ->make(true);
    }
}

























