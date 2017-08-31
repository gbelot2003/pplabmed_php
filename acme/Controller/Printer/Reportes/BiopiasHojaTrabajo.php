<?php


namespace Acme\Controller\Printer\Reportes;

use Acme\Helpers\PdfStringConversor;
use Illuminate\Support\Facades\Auth;
use Acme\Controller\Printer\Bases\PDFReporte;

class BiopiasHojaTrabajo
{
    function __construct()
    {
        $this->ConvertCharacters = new PdfStringConversor();
    }

    public function printPdfHitoReport($data, $bdate, $edate)
    {


        /**Configuraciones Iniciales **/
        $dates = ['inicio' => $bdate, 'fin' => $edate];
        $ftitle =  "Hoja de Trabajo - Biopsias";
        $user = Auth::User()->username;

        $pdf = new PDFReporte($orientation = 'P', $unit = 'mm', $size = 'Letter', $ftitle = $ftitle, $dates, $user);
        setlocale(LC_CTYPE, 'en_US');
        $pdf->AliasNbPages();
        $pdf->SetLeftMargin(1);

        $pdf->SetAutoPageBreak(true, 20);
        $pdf->AddPage();



        foreach ($data as $rows){

            /**
             * No Factura
             */
            $pdf->SetFont('Arial', '', 8);
            $pdf->Cell('15  ', '10', $rows->num_factura, 1, '', 'L');

            /**
             * Sede
             */
            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell('35  ', '10',  $this->ConvertCharacters->convert(substr($rows->direccion_entrega_sede, 0,20)), 1, '', 'L');

            /**
             * Nombre Paciente
             */
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell('64  ', '10', $this->ConvertCharacters->convert($rows->nombre_completo_cliente), 1, '', 'L');

            /**
             * Sexo
             */
            $pdf->SetFont('Arial', '', 8);
            $pdf->Cell('5', '10', $rows->sexo, 1, '', 'C');

            /**
             * Edad
             */
            $pdf->SetFont('Arial', '', 8);
            $pdf->Cell('10', '10', $rows->edad, 1, '', 'C');

            /**
             * Mdico
             */
            $pdf->SetFont('Arial', '', 6.5);
            $pdf->Cell('30', '10', $rows->medico, 1, '', 'L');

            /**
             * Examen
             */
            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell('40', '10', $this->ConvertCharacters->convert(substr($rows->examen['nombre_examen'], 0,35)), 1, '', 'L');

            /**
             * Informe
             */
            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell('15', '10', $this->checkSerial($rows->created_at->format('Y'), $rows->serial),1, 0, 'C', 0, '');


            $pdf->ln(10 );
        }


        $pdf->SetFont('Arial', '', 8);



        return $pdf->Output();
    }


    public function checkSerial($date, $value)
    {
        if(isset($value)){
            return $date . '-' . $value;
        }
        else{
            return "";
        }

    }

    public function checkValue($value)
    {
        if(isset($value)){
            return $value;
        }
        else{
            return "N/A";
        }

    }

    public function getHeigthCel($string)
    {
        $len = strlen($string);
        $overrydes = ['Cit. Aspiracion Mas De 4 Laminas'];

        if ($len <= 33)
        {
            if(in_array($string, $overrydes)){
                $size = 5;
            } else {
                $size = 10;
            }

        }
        else if ($len >= 34)
        {
            $size = 5;
        }

        return $size;
    }

}