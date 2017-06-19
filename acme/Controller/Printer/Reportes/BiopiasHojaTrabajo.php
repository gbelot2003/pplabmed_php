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

        $pdf->AddPage();

        $pdf->SetAutoPageBreak(true, 5);


        $pdf->SetFont('Arial', '', 8);
        foreach ($data as $rows){

            /**
             * No Factura
             */
            $x = $pdf->GetX();
            $y = $pdf->GetY();
            $pdf->SetFont('Arial', '', 7);
            $pdf->MultiCell('20  ', '5', $this->ConvertCharacters->convert($rows->num_factura), 1, 'L', '');
            $pdf->SetXY($x , $y+5);
            /**
             * Direccion sede
             */
            $pdf->SetFont('Arial', '', 4.5);
            $pdf->MultiCell('20', '5', $this->ConvertCharacters->convert($rows->direccion_entrega_sede), 1, 'L');
            $pdf->SetXY($x + 20 , $y);

            /**
             * Nombre Paciente
             */
            $pdf->SetFont('Arial', '', 8);
            $pdf->Cell('45', '10', $this->ConvertCharacters->convert($rows->nombre_completo_cliente), 1, 'L');


            /**
             * Edad
             */
            $pdf->SetFont('Arial', '', 8);
            $pdf->Cell('10', '10', $rows->sexo, 1, '', 'C');

            /**
             * Edad
             */
            $pdf->Cell('10', '10', $rows->edad, 1, '', '');


            /**
             * MEdico
             */
            $pdf->Cell('35', '10', $rows->medico, 1, '', 'L');

            /**
             * Examen
             */

            $pdf->MultiCell('45', 10, $this->ConvertCharacters->convert(substr($rows->examen['nombre_examen'], 0, 30)) , 'B', 'L', '');

            $pdf->SetXY($x + 165 , $y);
            /**
             * Informe
             */
            $pdf->Cell('30', '10', $this->checkSerial($rows->created_at->format('Y'), $rows->serial),1, 0, 'C', 0, '2');
            $pdf->ln(10 );
        }



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


}