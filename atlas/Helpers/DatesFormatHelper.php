<?php

namespace Atlas\Helpers;

use Carbon\Carbon;

class DatesFormatHelper {
    protected $date;

    /**
     * DateHelper constructor.
     */
    public function __construct($date)
    {
        $this->date = $date;
    }

    public function setDate()
    {

        $redate = $this->transformToReadableDate();

        $date = carbon::createFromFormat('Y-m-d', $redate);
        return $date->format('Y-m-d');

    }

    protected function getDate()
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