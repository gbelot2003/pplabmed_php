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
    public function store(Request $request)
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchPage()
    {
        $idCIto = Categoria::where('status', 1)->pluck('name', 'id');
        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        return View('resultados.citologia.search_page', compact('idCIto', 'firmas'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processForm(Request $request)
    {
        $request->get('serial') ? $serial = $request->get('serial'): $serial = 'null';
        $request->get('factura_id') ? $factura_id = $request->get('factura_id'): $factura_id = 'null';
        $request->get('nombre_completo_cliente') ? $nombre = $request->get('nombre_completo_cliente'): $nombre = 'null';
        $request->get('edad') ? $edad = $request->get('edad'): $edad = 'null';
        $request->get('sexo') ? $sexo = $request->get('sexo'): $sexo = 'null';
        $request->get('correo') ? $correo = $request->get('correo'): $correo = 'null';
        $request->get('correo2') ? $correo2 = $request->get('correo2'): $correo2 = 'null';
        $request->get('direccion_entrega_sede') ? $direccion = $request->get('direccion_entrega_sede'): $direccion = 'null';
        $request->get('medico') ? $medico = $request->get('medico'): $medico = 'null';

        $request->get('otros_a') ? $otros = $request->get('otros_a'): $otros = 'null';
        $request->get('gravidad') ? $gravidad = $request->get('gravidad'): $gravidad = 'null';
        $request->get('icitologia_id') ? $icito = $request->get('icitologia_id'): $icito = 'null';
        $request->get('para') ? $para = $request->get('para'): $para = 'null';
        $request->get('abortos') ? $abortos = $request->get('abortos'): $abortos = 'null';
        $request->get('fur') ? $fur = $request->get('fur'): $fur = 'null';
        $request->get('fup') ? $fup = $request->get('fup'): $fup = 'null';
        $request->get('fecha_informe') ? $finfo = $request->get('fecha_informe'): $finfo = 'null';
        $request->get('fecha_muestra') ? $fmues = $request->get('fecha_muestra'): $fmues = 'null';
        $request->get('firma_id') ? $firma1 = $request->get('firma_id'): $firma1 = 'null';
        $request->get('firma2_id') ? $firma2 = $request->get('firma2_id'): $firma2 = 'null';
        $request->get('otros_b') ? $otrosb = $request->get('otros_b'): $otrosb = 'null';
        $request->get('informe') ? $informe = $request->get('informe'): $informe = 'null';
        $request->get('diagnostico') ? $diagnostico = $request->get('diagnostico'): $diagnostico = 'null';


        $url = 'citologia/resultados/'.$serial.'/'.$factura_id.'/'.$nombre.'/'.$edad.'/'.$sexo.'/'.$correo.'/'.$correo2.'/'.$direccion.'/'.$medico.'/'.$otros.'/'.$gravidad.'/'.$icito.'/'.$para.'/'.$abortos.'/'.$fur.'/'.$fup.'/'.$finfo.'/'.$fmues.'/'.$firma1.'/'.$firma2.'/'.$otrosb.'/'.$informe.'/'.$diagnostico;
        return redirect()->to($url);
    }



    /**
     * @param Request $request
     */
    public function search($serial, $factura_id, $nombre, $edad, $sexo, $correo, $correo2, $direccion, $medico, $otros, $gravidad, $icito, $para, $abortos, $fur, $fup, $finfo, $fmues, $firma1, $firma2, $otrosb, $informe, $diagnostico)
    {

        $idCIto = Categoria::where('status', 1)->pluck('name', 'id');
        $firmas = Firma::where('status', 1)->pluck('name', 'id');

        $query = Citologia::with('facturas');

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

        if($otros != 'null'){
            $query->where('otros_a', 'like', '%' . $otros . '%');
        }

        if($icito != 'null'){
            $query->where('icitologia_id', $icito);
        }

        if($gravidad != 'null'){
            $query->where('gravidad', 'like', '%' . $gravidad . '%');
        }

        if($para != 'null'){
            $query->where('gravidad', $para);
        }

        if($abortos != 'null'){
            $query->where('abortos', $abortos);
        }

        if($fur != 'null'){
            $query->where('fur', $fur);
        }

        if($fup != 'null'){
            $query->where('fup', $fup);
        }

        if($finfo != 'null'){
            $query->where('fecha_informe', $finfo);
        }

        if($fmues != 'null'){
            $query->where('fecha_muestra', $fmues);
        }

        if($firma1 != 'null'){
            $query->where('firma_id', $firma1);
        }

        if($firma2 != 'null'){
            $query->where('firma_id', $firma2);
        }

        if($otrosb != 'null'){
            $query->where('otros_b', 'like', '%' . $otrosb . '%');
        }

        if($informe != 'null'){
            $query->where('informe', 'like', '%' . $informe . '%');
        }

        if($diagnostico != 'null'){
            $query->where('diagnostico', 'like', '%' . $diagnostico . '%');
        }


        $items = $query->paginate(1);
        return View('resultados.citologia.search_results', compact('items','idCIto', 'firmas'));
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

























