<?php

namespace Acme\Helpers;

class PdfStringConversor {

    public function convert($string)
    {
        return iconv('UTF-8', 'windows-1252//IGNORE', $string);
    }
}