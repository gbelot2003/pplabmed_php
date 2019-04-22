<?php

namespace Acme\Helpers;

class PdfStringConversor
{

    public function convert($string)
    {
        $encoding = mb_detect_encoding($string, mb_detect_order(), false);

        if ($encoding == "UTF-8") {
            $string = mb_convert_encoding($string, 'UTF-8', 'UTF-8');
        }

        $out = iconv(mb_detect_encoding($string, mb_detect_order(), false), "UTF-8//IGNORE", $string);

        return $out;
        //return iconv('UTF-8', 'windows-1252//IGNORE', $string);
    }

}