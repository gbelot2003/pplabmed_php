<?php
namespace App\Http\Controllers\Reportes;

use App\Audit;
use App\Http\Controllers\Controller;
use App\User;
use Atlas\Helpers\DatesFormatHelper;
use Atlas\Helpers\FormatQueryDates;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportesLogs extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ShowReports');
        $this->middleware('ShowLogs');
        $this->formatQuery = new FormatQueryDates();
    }

    public function index()
    {
        $user = User::where('status', 1)->pluck('username', 'id');

        $tipo = [
            'Biopsia' => 'Biopsia',
            'Citología' => 'Citología',
            'Facturas' => 'Facturas'
        ];

        return view('reportes.logs.index', compact('user', 'tipo'));
    }

    public function results(Request $request)
    {
        if ($request->has('inicio')) {
            $date = new DatesFormatHelper($request->get('inicio'));
            $b_date = $date->setDate();
        }

        if ($request->has('final')) {
            $date = new DatesFormatHelper($request->get('final'));
            $e_date = $date->setDate();
        }

        if (isset($b_date) && isset($e_date)) {
            list($bdate, $edate) = $this->formatQuery->formatQueryDates($b_date, $e_date);
        }

        $user = User::findOrFail($request->user_id);

        $logs = Audit::whereBetween('created_at', [$bdate, $edate]);

        if(isset($request->tipo_id)){
            $logs->where('title', 'like', '%' . $request->tipo_id . '%');
        }

        if (isset($request->user_id)){
            $logs->where('user_id', $request->user_id);
        }

        $results = $logs->get();

        $return = Excel::create('Auditoria de ' . $user->username . 'de: ' .$bdate . 'hasta: ' . $edate. 'de tipo - ' . $request->tipo_id, function ($excel) use ($results, $bdate, $edate, $user) {

            $excel->sheet('Audits', function ($sheet) use ($results, $bdate, $edate, $user) {
                $sheet->loadView('reportes.logs.results', compact('results', 'bdate', 'edate', 'user'));
            });

        })->export('xls');

    }

}





















