<?php

namespace Acme\Refactoria\Interfaces;


interface RepositoryQueryInterface
{
    public function queryTimeRagesResults($bdate, $edate);
}