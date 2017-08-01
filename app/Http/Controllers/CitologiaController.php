<?php

namespace App\Http\Controllers;

use Acme\Controller\CitologiaControllerHelper;
use Acme\Helpers\SerialHelper;
use App\Audit;
use App\Categoria;
use App\Citologia;
use App\CitoSerial;
use App\Firma;
use App\Http\Requests\CitologiaValidate;
use Atlas\Helpers\DateHelper;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;
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
            if ($val === 'none') {
                $request['firma2_id'] = null;
            }
        }

        $cito = Citologia::create($request->all());
        $serialHelper->setSerial($request->input('serial'), 1);

        Audit::create([
            'title' => 'Citología',
            'action' => 'creación',
            'details' => $cito->serial . ' - Factura ' . $cito->facturas->num_factura,
            'user_id' => Auth::user()->id
        ]);

        flash('Registro Creado', 'success')->important();

        return redirect()->to(action('CitologiaController@edit', $cito->serial));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $item = Citologia::where('serial', $id)->first();

        $idCIto = Categoria::where('status', 1)->pluck('name', 'id');
        $firmas = Firma::where('status', 1)->pluck('name', 'id');


        $CitoList = Citologia::orderBy('serial', 'ASC')->get();
        $previous = Citologia::where('serial', '<', $item->serial)->max('serial');
        $next = Citologia::where('serial', '>', $item->serial)->min('serial');


        $total = $CitoList->count();
        $first = $CitoList->first();
        $last = $CitoList->last();

        $now = date("Y-m-d");
        $bdate = Carbon::createFromFormat('Y-m-d', $now)->startOfDay();
        $edate = Carbon::createFromFormat('Y-m-d', $now)->endOfDay();
        $today = Citologia::whereBetween('created_at', [$bdate, $edate])->count();

        return View('resultados.citologia.edit', compact('item', 'idCIto', 'firmas', 'gravidad', 'previous', 'next', 'total', 'today', 'first', 'last'));
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
            if ($val === 'none') {
                $request['firma2_id'] = null;
            }
        }

        $cito->update($request->all());

        Audit::create([
            'title' => 'Citología',
            'action' => 'edición',
            'details' => $cito->serial . ' - Factura ' . $cito->facturas->num_factura,
            'user_id' => Auth::user()->id
        ]);

        flash('Registro Actualizado', 'success')->important();

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
     * @return \Illuminate\Http\RedirectResponse
     * @internal param Request $request
     */
    public function processForm()
    {

        $idCIto = Categoria::where('status', 1)->pluck('name', 'id');
        $firmas = Firma::where('status', 1)->pluck('name', 'id');

        $query = Citologia::with('facturas');

        $now = date("Y-m-d");
        $bdate = Carbon::createFromFormat('Y-m-d', $now)->startOfDay();
        $edate = Carbon::createFromFormat('Y-m-d', $now)->endOfDay();
        $today = Citologia::whereBetween('created_at', [$bdate, $edate])->count();

        $this->performSearchQuery($query);
        $query->orderBy('serial', 'ASC');
        $items = $query->paginate(1)->appends(\Request::all());

        return View('resultados.citologia.search_results', compact('items', 'idCIto', 'firmas', 'today'));
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
                return '<a href="citologias/' . $items->serial . '/edit" class="btn btn-xs btn-primary">Ver Detalle</a>';
            })
            ->addColumn('finforme', function ($items) {
                return $items->fecha_informe->format('d/m/Y');
            })
            ->rawColumns(['href'])
            ->make(true);
    }

    /**
     * @param $query
     */
    protected function performSearchQuery($query)
    {

        if (\request()->has('serial')) {
            $pacesholder = \request()->get('serial');
            $query->where('serial', $pacesholder);
        }

        if (\request()->has('factura_id')) {
            $pacesholder = \request()->get('factura_id');
            $query->where('factura_id', $pacesholder);
        }

        if (\request()->has('nombre_completo_cliente')) {
            $pacesholder = \request()->get('nombre_completo_cliente');
            $query->whereHas('facturas', function ($q) use ($pacesholder) {
                $q->Where('nombre_completo_cliente', $pacesholder);
            });
        }

        if (\request()->has('edad')) {
            $pacesholder = \request()->get('edad');
            $query->whereHas('facturas', function ($q) use ($pacesholder) {
                $q->Where('edad', $pacesholder);
            });
        }

        if (\request()->has('sexo')) {
            $pacesholder = \request()->get('sexo');
            $query->whereHas('facturas', function ($q) use ($pacesholder) {
                $q->Where('sexo', $pacesholder);
            });
        }

        if (\request()->has('correo')) {
            $pacesholder = \request()->get('correo');
            $query->whereHas('facturas', function ($q) use ($pacesholder) {
                $q->Where('correo', $pacesholder);
            });
        }

        if (\request()->has('correo2')) {
            $pacesholder = \request()->get('correo');
            $query->whereHas('facturas', function ($q) use ($pacesholder) {
                $q->Where('correo2', $pacesholder);
            });
        }

        if (\request()->has('direccion_entrega_sede')) {
            $pacesholder = \request()->get('direccion_entrega_sede');
            $query->whereHas('facturas', function ($q) use ($pacesholder) {
                $q->Where('direccion_entrega_sede', $pacesholder);
            });
        }

        if (\request()->has('medico')) {
            $pacesholder = \request()->get('medico');
            $query->whereHas('facturas', function ($q) use ($pacesholder) {
                $q->Where('medico', 'LIKE', '%' . $pacesholder . '%');
            });
        }

        if (\request()->has('otros_a')) {
            $pacesholder = \request()->get('otros_a');
            $query->where('otros_a', $pacesholder);
        }

        if (\request()->has('icitologia_id')) {
            $pacesholder = \request()->get('icitologia_id');
            $query->where('icitologia_id', $pacesholder);
        }

        if (\request()->has('gravidad')) {
            $pacesholder = \request()->get('gravidad');
            $query->where('gravidad', $pacesholder);
        }

        if (\request()->has('abortos')) {
            $pacesholder = \request()->get('abortos');
            $query->where('abortos', $pacesholder);
        }

        if (\request()->has('fur')) {
            $pacesholder = \request()->get('fur');
            $fur = new DateHelper($pacesholder);
            $query->where('fur', $fur->getDate());
        }

        if (\request()->has('fup')) {
            $pacesholder = \request()->get('fup');
            $fup = new DateHelper($pacesholder);
            $query->where('fup', $fup->getDate());
        }

        if (\request()->has('fecha_informe')) {
            $pacesholder = \request()->get('fecha_informe');
            $fecha_informe = new DateHelper($pacesholder);
            $query->where('fecha_informe', $fecha_informe->getDate());
        }

        if (\request()->has('fecha_muestra')) {
            $pacesholder = \request()->get('fecha_muestra');
            $fecha_muestra = new DateHelper($pacesholder);
            $query->where('fecha_muestra', $fecha_muestra->getDate());
        }

        if (\request()->has('firma_id')) {
            $pacesholder = \request()->get('firma_id');
            $query->where('firma_id', $pacesholder);
        }

        if (\request()->has('firma2_id')) {
            $pacesholder = \request()->get('firma2_id');
            $query->where('firma2_id', $pacesholder);
        }

        if (\request()->has('otros_b')) {
            $pacesholder = \request()->get('otros_b');
            $query->where('otros_b', $pacesholder);
        }

        if (\request()->has('informe')) {
            $pacesholder = \request()->get('informe');
            $query->where('informe', 'LIKE', '%' . $pacesholder . '%');
        }


        if (\request()->has('diagnostico')) {
            $pacesholder = \request()->get('diagnostico');
            $query->where('diagnostico', 'LIKE', '%' . $pacesholder . '%');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @internal param $id
     */
    public function updateFacturaNum(Request $request)
    {
        $cito = Citologia::findOrFail($request->get('id'));
        $cito->factura_id = $request->get('factura_id');
        $cito->save();

        Audit::create([
            'title' => 'Citología',
            'action' => 'duplicación de Factura',
            'details' => $cito->serial . ' - Factura ' . $cito->facturas->num_factura,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->to(action('CitologiaController@edit', $cito->id));
    }
}

























