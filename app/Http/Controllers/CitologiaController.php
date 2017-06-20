<?php

namespace App\Http\Controllers;

use Acme\Controller\CitologiaControllerHelper;
use Acme\Helpers\DateHelper;
use Acme\Helpers\SerialHelper;
use App\Categoria;
use App\Citologia;
use App\CitoSerial;
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
        $this->middleware('ManageCito');
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
        $serialHelper = new SerialHelper();
        $serial = $serialHelper->getSerial(1);
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
        $serialHelper = new SerialHelper();
        $request['serial'] = $serialHelper->getSerial(1);

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
            if ($val === 'none'){
                $request['firma2_id'] = null;
            }
        }

        $cito = Citologia::create($request->all());
        $cito->facturas->update($request->all());
        $serialHelper->setSerial($request->input('serial'), 1);
        flash('Reegistro Creado', 'success')->important();

        return redirect()->to(action('CitologiaController@edit', $cito->id));
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

        $previous = Citologia::where('id', '<', $item->id)->max('id');
        $next = Citologia::where('id', '>', $item->id)->min('id');

        $now = date("Y-m-d");
        $bdate = Carbon::createFromFormat('Y-m-d', $now)->startOfDay();
        $edate = Carbon::createFromFormat('Y-m-d', $now)->endOfDay();
        $today = Citologia::whereBetween('created_at', [$bdate, $edate])->count();
        return View('resultados.citologia.edit', compact('item', 'idCIto', 'firmas', 'gravidad', 'previous', 'next', 'total', 'today'));
    }

    /**
     * @param CitologiaValidate $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CitologiaValidate $request, $id)
    {
        $cito = Citologia::findOrFail($id);
        $cito->deteccion_cancer = isset($request['deteccion_cancer']) ? $request['deteccion_cancer'] = 1 : $request['deteccion_cancer'] = 0;
        $cito->indice_maduracion = isset($request['indice_maduracion']) ? $request['indice_maduracion'] = 1 : $request['indice_maduracion'] = 0;
        $cito->mm = isset($request['mm']) ? $request['mm'] = 1 : $request['mm'] = 0;

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
            if ($val === 'none'){
                $request['firma2_id'] = null;
            }
        }

        $cito->update($request->all());
        $cito->facturas->update($request->all());



        flash('Reegistro Actualizado', 'success')->important();
        return redirect()->back();
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
        $citoHelper = new CitologiaControllerHelper();
        $url = $citoHelper->ProcessFormVariables($request);
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
     * @param $otros
     * @param $gravidad
     * @param $icito
     * @param $para
     * @param $abortos
     * @param $fur
     * @param $fup
     * @param $finfo
     * @param $fmues
     * @param $firma1
     * @param $firma2
     * @param $otrosb
     * @param $informe
     * @param $diagnostico
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param Request $request
     */
    public function search($serial, $factura_id, $nombre, $edad, $sexo, $correo, $correo2, $direccion, $medico, $otros,
                           $gravidad, $icito, $para, $abortos, $fur, $fup, $finfo, $fmues, $firma1, $firma2, $otrosb,
                           $informe, $diagnostico)
    {
        $citoHelper = new CitologiaControllerHelper();
        $idCIto = Categoria::where('status', 1)->pluck('name', 'id');
        $firmas = Firma::where('status', 1)->pluck('name', 'id');

        $items = $citoHelper->contrucPagination($serial, $factura_id, $nombre, $edad, $sexo, $correo, $correo2, $direccion,
            $medico, $otros, $gravidad, $icito, $para, $abortos, $fur, $fup, $finfo,
            $fmues, $firma1, $firma2, $otrosb, $informe, $diagnostico);

        return View('resultados.citologia.search_results', compact('items', 'idCIto', 'firmas'));
    }

    /**
     * @return mixed
     */
    public function listados()
    {
        $items = Citologia::select([
            'citologias.id',
            'citologias.serial',
            'citologias.factura_id',
            'facturas.nombre_completo_cliente',
            'categorias.name as citoId',
            'facturas.medico',
            'firmas.name',
            'citologias.created_at',
            'citologias.fecha_informe'
        ])
            ->Join('facturas', 'factura_id', '=', 'facturas.num_factura')
            ->Join('categorias', 'icitologia_id', '=', 'categorias.id')
            ->Join('firmas', 'firma_id', '=', 'firmas.id');

        return Datatables::of($items)
            ->addColumn('href', function ($items) {
                return '<a href="citologias/' . $items->id . '/edit" class="btn btn-xs btn-primary">Ver Detalle</a>';
            })
            ->addColumn('finforme', function ($items) {
                return $items->fecha_informe->format('d/m/Y');
            })
            ->rawColumns(['href'])
            ->make(true);
    }
}

























