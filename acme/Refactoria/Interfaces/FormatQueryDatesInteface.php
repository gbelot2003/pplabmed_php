<?php

namespace Acme\Refactoria\Interfaces;

use Illuminate\Http\Request;

interface FormatQueryDatesInteface
{
    public function formatQueryDates(Request $request);
}