<?php

namespace Acme\Refactoria\Builds;


use Acme\Refactoria\Interfaces\QueryConcreatInterface;
use Acme\Refactoria\Interfaces\QueryModelsInterfaces;
use Illuminate\Http\Request;

class ReporteMuestraBuild implements QueryConcreatInterface
{

    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function instancesRequires()
    {
        // TODO: Implement instancesRequires() method.
    }

    public function builRequiresController()
    {
        // TODO: Implement builRequiresController() method.
    }

    public function builCallController(Request $request)
    {
        // TODO: Implement builCallController() method.
    }
}