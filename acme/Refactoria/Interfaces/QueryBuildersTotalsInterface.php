<?php
/**
 * Created by PhpStorm.
 * User: gbelot
 * Date: 06-05-17
 * Time: 03:29 PM
 */

namespace Acme\Refactoria\Interfaces;

interface QueryBuildersTotalsInterface
{
    /**
     * @return int
     */
    public function buildTotalQuery();
}