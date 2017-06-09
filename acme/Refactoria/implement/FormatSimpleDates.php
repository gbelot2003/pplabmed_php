<?php

namespace Acme\Refactoria\Implement;

use Acme\Refactoria\Interfaces\FormatQueryDatesInteface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FormatSimpleDates implements FormatQueryDatesInteface {

    public function formatQueryDates(Request $request)
    {
        $bdate = Carbon::createFromFormat('Y-m-d', $request->get('inicio'))->startOfDay();
        $edate = Carbon::createFromFormat('Y-m-d', $request->get('final'))->endOfDay();
        return array($bdate, $edate);
    }
}