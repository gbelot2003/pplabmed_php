<?php

namespace App\Http\Controllers;

use Acme\Helpers\SerialHelper;
use App\Audit;
use App\CitoSerial;
use App\Events\OpenCloseFormEvent;
use App\Events\UpdateHistopatologia;
use App\Firma;
use App\Histopatologia;
use App\Http\Requests\HistopatiaValidation;
use App\LinkImage;
use App\Plantilla;
use Atlas\Helpers\DateHelper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class HistopatologiaController extends Controller
{
    /**
     * HistopatologiaController constructor.
     */
    public function __construct()
    {
        //TODO: Remover excepción
        $this->middleware('auth')->except(['histoData']);
        $this->middleware('checkActive')->except(['histoData']);
        $this->middleware('ManageHisto')->except(['histoData']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $serial = CitoSerial::findOrFail(2);
        //return View('resultados.histopatologia.index', compact('serial'));
        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        return View('resultados.histopatologia.search_page', compact('firmas'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $serialHelper = new SerialHelper();
        $serial = $serialHelper->getSerial(2);
        $link = LinkImage::create([
            'user_id' => Auth::user()->id
        ]);

        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        $plantillas = Plantilla::where('type', 1)->get();
        return View('resultados.histopatologia.create', compact('serial', 'firmas', 'plantillas', 'link'));
    }

    /**
     * @param HistopatiaValidation $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(HistopatiaValidation $request)
    {

        dd($request);
        
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

        event(new UpdateHistopatologia($histo));
        flash('Registro Creado', 'success')->important();
        return $histo->id;
        //return redirect()->to(action('HistopatologiaController@edit', $histo->id));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $item = Histopatologia::where('id', $id)->first();

        $user = Auth::User();

        $object['user_id'] = $user->id;
        $object['serial'] = $item->serial;
        $object['id'] = $item->id;
        $object['username'] = $user->username;

        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        $plantillas = Plantilla::where('type', 1)->get();
        $i = 0;

        $previous = Histopatologia::where('id', '<', $item->id)
            ->orderBy('id', 'Asc')
            ->max('id');

        $next = Histopatologia::where('id', '>', $item->id)
            ->orderBy('id', 'Asc')
            ->min('id');

        $histo = Histopatologia::orderBy('id', 'ASC')->get();
        $total = $histo->count();
        $first = $histo->first();
        $last = $histo->last();

        $now = date("Y-m-d");
        $bdate = Carbon::createFromFormat('Y-m-d', $now)->startOfDay();
        $edate = Carbon::createFromFormat('Y-m-d', $now)->endOfDay();
        $today = Histopatologia::whereBetween('created_at', [$bdate, $edate])->count();

        return View('resultados.histopatologia.edit', compact('item', 'plantillas', 'firmas', 'postId', 'i', 'previous', 'next', 'total', 'today', 'first', 'last' , 'user'));


    }

    /**
     * @param HistopatiaValidation $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(HistopatiaValidation $request, $id)
    {
        //dd($request->all());
        $item = Histopatologia::findOrFail($id);
        $item->io = 0;
        $user = Auth::User();

        $object['user_id'] = $user->id;
        $object['serial'] = $item->serial;
        $object['id'] = $item->id;
        $object['username'] = $user->username;

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
            'title' => 'Biopsias',
            'action' => 'edición',
            'details' => $item->serial . ' - Factura ' . $item->facturas->num_factura,
            'user_id' => Auth::user()->id
        ]);

        event(new UpdateHistopatologia($item));

        flash('Registro Actualizado', 'success')->important();
        return redirect()->to(action('HistopatologiaController@edit', $item->serial));
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
        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        $plantillas = Plantilla::all();
        $i = 0;

        $query = Histopatologia::with('facturas');

        $this->performSearchQuery($query);
        $query->orderBy('serial', 'ASC');
        $items = $query->paginate(1)->appends(\Request::all());
        $i = 0;

        return View('resultados.histopatologia.search_results', compact('items', 'plantillas', 'firmas', 'postId', 'i', 'today'));

    }

    /**
     * @return mixed
     * @throws \Exception
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
            ->addColumn('href', function ($items) {
                return '<a href="histopatologia/' . $items->id . '/edit" class="btn btn-xs btn-primary">Ver Detalle</a>';
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
        /**
         * Si la fecha hasta es null, entonces es = a desde
         */

        if (\request()->has('fecha_informe_inicio') || \request()->has('fecha_informe_final')) {

            $pacesholderA = \request()->get('fecha_informe_inicio');
            $pacesholderb = \request()->get('fecha_informe_final');

            if($pacesholderA != null){
                $muestraA = new DateHelper($pacesholderA);
            }

            if($pacesholderb != null){
                $muestraB = new DateHelper($pacesholderb);
            } else {
                $muestraB = new DateHelper($pacesholderA);
            }

            if($muestraA && $muestraB){
                $query->whereBetween('fecha_informe', [$muestraA->getDate(), $muestraB->getDate()]);
            } else{
                $query->where('fecha_informe', $muestraA);
            }
        }

        if (\request()->has('fecha_biopcia_inicio') || \request()->has('fecha_biopcia_final')) {

            $pacesholderA = \request()->get('fecha_biopcia_inicio');
            $pacesholderb = \request()->get('fecha_biopcia_final');

            if($pacesholderA != null){
                $muestraA = new DateHelper($pacesholderA);
            }

            if($pacesholderb != null){
                $muestraB = new DateHelper($pacesholderb);
            } else {
                $muestraB = new DateHelper($pacesholderA);
            }

            if($muestraA && $muestraB){
                $query->whereBetween('fecha_biopcia', [$muestraA->getDate(), $muestraB->getDate()]);
            } else{
                $query->where('fecha_biopcia', $muestraA);
            }
        }

        if (\request()->has('fecha_muestra_inicio') || \request()->has('fecha_muestra_final')) {

            $pacesholderA = \request()->get('fecha_muestra_inicio');
            $pacesholderb = \request()->get('fecha_muestra_final');

            if($pacesholderA != null){
                $muestraA = new DateHelper($pacesholderA);
            }

            if($pacesholderb != null){
                $muestraB = new DateHelper($pacesholderb);
            } else {
                $muestraB = new DateHelper($pacesholderA);
            }

            if($muestraA && $muestraB){
                $query->whereBetween('fecha_muestra', [$muestraA->getDate(), $muestraB->getDate()]);
            } else{
                $query->where('fecha_muestra', $muestraA);
            }
        }

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
            //dd($pacesholder);
            $query->whereHas('facturas', function ($q) use ($pacesholder) {
                $q->Where('nombre_completo_cliente', 'LIKE', '%' . $pacesholder . '%');
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

        if (\request()->has('topog')) {
            $pacesholder = \request()->get('topog');
            $query->where('topog', $pacesholder);
        }

        if (\request()->has('mor1')) {
            $pacesholder = \request()->get('mor1');
            $query->where('mor1', $pacesholder);
        }

        if (\request()->has('mor2')) {
            $pacesholder = \request()->get('mor2');
            $query->where('mor2', $pacesholder);
        }

        if (\request()->has('firma_id')) {
            $pacesholder = \request()->get('firma_id');
            $query->where('firma_id', $pacesholder);
        }

        if (\request()->has('firma2_id')) {
            $pacesholder = \request()->get('firma2_id');
            $query->where('firma2_id', $pacesholder);
        }

        if (\request()->has('diagnostico')) {
            $pacesholder = \request()->get('diagnostico');
            $query->where('diagnostico', 'LIKE', '%' . $pacesholder .'%');
        }

        if (\request()->has('muestra')) {
            $pacesholder = \request()->get('muestra');
            $query->where('muestra', 'LIKE', '%' . $pacesholder . '%');
        }

        if (\request()->has('informe')) {
            $pacesholder = \request()->get('informe');
            $query->where('informe', 'LIKE', '%' . $pacesholder . '%');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @internal param $id
     */
    public function updateFacturaNum(Request $request)
    {
        $histo = Histopatologia::findOrFail($request->get('id'));
        $histo->factura_id = $request->get('factura_id');
        $histo->save();

        Audit::create([
            'title' => 'Biopsias',
            'action' => 'edición',
            'details' => $histo->serial . ' - Factura ' . $histo->facturas->num_factura,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->to(action('HistopatologiaController@edit', $histo->id));
    }

    /**
     * @param $serial
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function findBySerial($serial)
    {
        $histo = Histopatologia::where('factura_id', $serial)->with('facturas')->first();
        return $histo;
    }


}
