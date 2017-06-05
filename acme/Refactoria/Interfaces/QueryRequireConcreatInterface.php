<?php
/**
 * Created by PhpStorm.
 * User: gbelot
 * Date: 06-05-17
 * Time: 04:02 PM
 */

namespace Acme\Refactoria\Implement;


interface QueryRequireConcreatInterface
{

    public function __construct();

    public function builRequiresController();
}