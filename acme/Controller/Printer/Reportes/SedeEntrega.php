<?php


namespace Acme\Controller\Printer\Reportes;

use Acme\Controller\Printer\Bases\PDFReporteSede;
use Acme\Helpers\PdfStringConversor;
use Illuminate\Support\Facades\Auth;

class SedeEntrega
{
    function __construct()
    {
        $this->ConvertCharacters = new PdfStringConversor();
    }

    public function printPdfHitoReport($data, $bdate, $edate, $total, $direccion)
    {

        $dates = ['inicio' => $bdate, 'fin' => $edate];
        $user = Auth::User()->username;
        if(isset($direccion)){
            $ftitle =  $this->ConvertCharacters->convert($direccion);
        } else {
            $ftitle =  $this->ConvertCharacters->convert("Reporte por Sedes");
        }

        $pdf = new PDFReporteSede($orientation = 'P', $unit = 'mm', $size = 'Letter', $ftitle = $ftitle, $dates, $user, $total);

        header('Content-type: application/pdf');
        setlocale(LC_CTYPE, 'en_US');
        $pdf->SetLeftMargin(1);

        $pdf->AliasNbPages();

        $pdf->AddPage();

        $pdf->SetAutoPageBreak(true, 10);

        foreach ($data as $rows)
        {
            /**
             * No Factura
             */
            $pdf->SetFont('Arial', '', 8);
            $pdf->Cell('15  ', '10', $rows['num_factura'], 1, '', 'L');

            /**
             * Nombre Paciente
             */
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell('64  ', '10', $this->ConvertCharacters->convert($rows['nombre_completo_cliente']), 1, '', 'L');

            /**
             * Sexo
             */
            $pdf->SetFont('Arial', '', 8);
            $pdf->Cell('5', '10', $rows['sexo'], 1, '', 'C');

            /**
             * Edad
             */
            $pdf->SetFont('Arial', '', 8);
            $pdf->Cell('10', '10', $rows['edad'], 1, '', 'C');

            /**
             * Medico
             */
            $pdf->SetFont('Arial', '', 8);
            $pdf->Cell('30', '10', $this->ConvertCharacters->convert($rows['medico']), 1, '', 'L');

            /**
             * Examen
             */
            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell('45', '10', $this->ConvertCharacters->convert(substr($rows['nombre_examen'], 0,35)), 1, '', 'L');

            $pdf->Cell('40', 10, '', 1);

            $pdf->ln(10 );
        }


        return $pdf->Output('D','filename.pdf');

    }
}