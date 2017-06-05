<?php

namespace Acme\Refactoria\Interfaces;

use Illuminate\Http\Request;

interface QueryModelsInterfaces
{

    public function __construct(Request $request);

    /**
     * @return mixed
     */
    public function instancesRequires();
}
