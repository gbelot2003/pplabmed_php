<?php

namespace Acme\Helpers;

use Carbon\Carbon;

class DateHelper {

    protected $date;

    /**
     * DateHelper constructor.
     */
    public function __construct($date)
    {
        $this->date = $date;
    }

    protected function setDate()
    {

        $redate = $this->transformToReadableDate();

        $date = carbon::createFromFormat('Y-m-d', $redate);
        return $date->format('Y-m-d');

    }

    public function getDate()
    {
        return $this->setDate();
    }

    /**
     * @return string
     */
    protected function transformToReadableDate()
    {
        $porciones = explode("/", $this->date);
        $redate = ($porciones[2] . "-" . $porciones[1] . "-" . $porciones[0]);
        return $redate;
    }
}