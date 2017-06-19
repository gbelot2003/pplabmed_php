<?php


namespace Acme\Controller\Printer\Reportes;

use Acme\Helpers\PdfStringConversor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Acme\Controller\Printer\Bases\PDFReporte;

class CitologiaHojaTrabajo
{
    function __construct()
    {
        $this->ConvertCharacters = new PdfStringConversor();
    }

    public function printPdfHitoReport($data, $bdate, $edate)
    {
        /**Configuraciones Iniciales **/
        $dates = ['inicio' => $bdate, 'fin' => $edate];
        $user = Auth::User()->username;
        $ftitle =  $this->ConvertCharacters->convert("Hoja de Citología");
        $pdf = new PDFReporte($orientation = 'P', $unit = 'mm', $size = 'Letter', $ftitle = $ftitle, $dates, $user);
        setlocale(LC_CTYPE, 'en_US');
        $pdf->AliasNbPages();

        $pdf->AddPage();

        $pdf->SetAutoPageBreak(true, 30);

        $pdf->SetFont('Arial', '', 8);
        foreach ($data as $rows){

            /**
             * No Factura
             */
            $pdf->Cell('20  ', '10', $rows->num_factura, 1, '', 'L');
            $x = $pdf->GetX();
            $y = $pdf->GetY();
            /**
             * Nombre Paciente
             */
            $pdf->MultiCell('45', '5', $this->ConvertCharacters->convert($rows->nombre_completo_cliente), 1, 'L');
            $pdf->SetXY($x , $y+5);
            /**
             * Direccion sede
             */
            $pdf->SetFont('Arial', '', 5.5);

            $pdf->MultiCell('45', '5', $this->ConvertCharacters->convert($rows->direccion_entrega_sede), 1, 'L');
            $pdf->SetXY($x + 45 , $y);

            /**
             * Edad
             */
            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell('10', '10', $rows->sexo, 1, '', 'C');

            /**
             * Edad
             */
            $pdf->Cell('10', '10', $rows->edad, 1, '', 'C');


            /**
             * Medico
             */
            $pdf->Cell('35', '10', $rows->medico, 1, '', 'L');

            /**
             * Examen
             */

            $pdf->MultiCell('45', 10, $this->ConvertCharacters->convert(substr($rows->examen['nombre_examen'], 0,32)) , 'B', 'L', '');

            $pdf->SetXY($x + 145 , $y);
            /**
             * Informe
             */
            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell('30', '10', $this->checkSerial($rows->created_at->format('Y'), $rows->serial),1, 0, 'C', 0, '');
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