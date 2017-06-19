<?php

namespace Atlas\Helpers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class FormatQueryDates
{

    public function formatQueryDates($inicio, $final)
    {
        $bdate = Carbon::createFromFormat('Y-m-d', $inicio)->startOfDay();
        $edate = Carbon::createFromFormat('Y-m-d', $final)->endOfDay();
        return array($bdate, $edate);
    }
}