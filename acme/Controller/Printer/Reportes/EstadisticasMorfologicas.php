<?php

namespace Acme\Controller\Printer\Reportes;

use Acme\Controller\Printer\Bases\PDFReporteEsMorfo;
use Acme\Helpers\PdfStringConversor;
use Illuminate\Support\Facades\Auth;

class EstadisticasMorfologicas
{
    function __construct()
    {
        $this->ConvertCharacters = new PdfStringConversor();
    }

    public function printPdfHitoReport($data, $bdate, $edate)
    {


        /**Configuraciones Iniciales **/
        $dates = ['inicio' => $bdate, 'fin' => $edate];
        $ftitle = $this->ConvertCharacters->convert("Estadística Morfología");
        $user = Auth::User()->username;

        $pdf = new PDFReporteEsMorfo($orientation = 'P', $unit = 'mm', $size = 'Letter', $ftitle = $ftitle, $dates, $user);
        setlocale(LC_CTYPE, 'en_US');
        $pdf->AliasNbPages();
        $pdf->SetLeftMargin(1);

        $pdf->SetAutoPageBreak(true, 20);
        $pdf->AddPage();

        foreach ($data as $rows){
            /**
             * Fecha de Factura
             */
            $pdf->SetFont('Arial', '', 8);
            $pdf->Cell('30  ', '10', $rows->fecha_informe->format('d/m/Y'), 1, '', 'C');

            /**
             * Factura Id
             */
            $pdf->Cell('25  ', '10', $rows->factura_id, 1, '', 'C');

            /**
             * nombre_completo_cliente
             */
            $pdf->Cell('50  ', '10', $this->ConvertCharacters->convert($rows->facturas->nombre_completo_cliente), 1, '', 'L');

            /**
             * Morfo 1
             */
            $pdf->Cell('20  ', '10', $rows->mor1, 1, '', 'C');

            /**
             * Morfo 2
             */
            $pdf->Cell('20  ', '10', $rows->mor2, 1, '', 'C');

            /**
             * Topog
             */
            $pdf->Cell('25  ', '10', $rows->topog, 1, '', 'C');

            /**
             * Topog
             */
            $pdf->Cell('25  ', '10', $rows->serial, 1, '', 'C');
            $pdf->ln(10);
        }


        $pdf->Cell('30', '10', "TOTAL: ", 1, '', 'C');
        $pdf->Cell('165', '10', $data->count(), 1, '', 'L');

        $pdf->SetFont('Arial', '', 8);


        $pdf->Output();
        return exit;
    }


    public function checkSerial($date, $value)
    {
        if (isset($value)) {
            return $date . '-' . $value;
        } else {
            return "";
        }

    }

    public function checkValue($value)
    {
        if (isset($value)) {
            return $value;
        } else {
            return "N/A";
        }

    }

    public function getHeigthCel($string)
    {
        $len = strlen($string);
        $overrydes = ['Cit. Aspiracion Mas De 4 Laminas'];

        if ($len <= 33) {
            if (in_array($string, $overrydes)) {
                $size = 5;
            } else {
                $size = 10;
            }

        } else if ($len >= 34) {
            $size = 5;
        }

        return $size;
    }


}