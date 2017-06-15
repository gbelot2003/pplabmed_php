<?php


namespace Acme\Controller\Printer\Reportes;

use Acme\Helpers\PdfStringConversor;
use Illuminate\Database\Eloquent\Model;

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
        $ftitle =  $this->ConvertCharacters->convert("Hoja de Citología");
        $pdf = new PDFReporte($orientation = 'P', $unit = 'mm', $size = 'Letter', $ftitle = $ftitle, $dates);
        setlocale(LC_CTYPE, 'en_US');
        $pdf->AliasNbPages();

        $pdf->AddPage();

        $pdf->SetAutoPageBreak(true, 30);
        /**
         * Cabezera
         */
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell('20', '5', 'No de Factura', 1, '', 'C');
        $pdf->Cell('45', '5', 'Paciente', 1, '', 'C');
        $pdf->Cell('10', '5', 'Sexo', 1, '', 'C');
        $pdf->Cell('10', '5', 'Edad', 1, '', 'C');
        $pdf->Cell('45', '5', 'Medico', 1, '', 'C');
        $pdf->Cell('45', '5', 'Examen', 1, '', 'C');
        $pdf->Cell('20', '5', 'Informe',1, 0, 'C', 0, '2');
        $pdf->ln(5 );
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
            $pdf->MultiCell('45', '5', $this->ConvertCharacters->convert($rows->direccion_entrega_sede), 1, 'L');
            $pdf->SetXY($x + 45 , $y);

            /**
             * Edad
             */
            $pdf->Cell('10', '10', $rows->sexo, 1, '', 'C');

            /**
             * Edad
             */
            $pdf->Cell('10', '10', $rows->edad, 1, '', 'C');


            /**
             * MEdico
             */
            $pdf->Cell('45', '10', $rows->medico, 1, '', 'L');

            /**
             * Examen
             */
            $pdf->Cell('45', '5', $rows->examen['nombre_examen'] , 1, 'L', '');

            /**
             * Informe
             */
            $pdf->Cell('20', '10', '2017-550013',1, 0, 'C', 0, '2');
            $pdf->ln(10 );
        }



        return $pdf->Output();
    }

}