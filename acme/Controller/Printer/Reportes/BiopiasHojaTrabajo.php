<?php


namespace Acme\Controller\Printer\Reportes;

use Acme\Helpers\PdfStringConversor;
use Illuminate\Database\Eloquent\Model;

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
        $ftitle =  "Hoja de Biopsias";
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
        $pdf->Cell('50', '5', 'Paciente', 1, '', 'C');
        $pdf->Cell('10', '5', 'Sexo', 1, '', 'C');
        $pdf->Cell('45', '5', 'Medico', 1, '', 'C');
        $pdf->Cell('50', '5', 'Examen', 1, '', 'C');
        $pdf->Cell('20', '5', 'Informe',1, 0, 'C', 0, '2');
        $pdf->ln(5 );
        $pdf->SetFont('Arial', '', 8);
        foreach ($data as $rows){
            $pdf->Cell('20  ', '10', $rows->num_factura, 1, '', 'L');
            $x = $pdf->GetX();
            $y = $pdf->GetY();
            $pdf->MultiCell('50', '5', $rows->nombre_completo_cliente, 1, 'L');
            $pdf->SetXY($x , $y+5);
            $pdf->MultiCell('50', '5', 'San Pedro Sula', 1, 'L');
            $pdf->SetXY($x + 50 , $y);
            $pdf->Cell('10', '10', 'F', 1, '', 'C');
            $pdf->Cell('45', '10', 'Dr. Manuel Sandoval	', 1, '', 'L');
            $pdf->Cell('50', '10', 'Cit. Genital Recibida En El Lab.', 1, '', 'L');
            $pdf->Cell('20', '10', '2017-550013',1, 0, 'C', 0, '2');
            $pdf->ln(10 );
        }



        return $pdf->Output();
    }

}