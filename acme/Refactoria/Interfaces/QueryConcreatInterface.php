<?php

namespace Acme\Refactoria\Interfaces;

use Illuminate\Http\Request;

interface QueryConcreatInterface
{

    public function builCallController(Request $request);
}