<?php

namespace Acme\Refactoria\Interfaces;

use Illuminate\Http\Request;

interface QueryConcreatInterface
{

    public function __construct();

    public function builRequiresController();

    public function builCallController(Request $request);
}