<?php

namespace Acme\Controller\Printer;

use Acme\Helpers\PdfStringConversor;
use App\Histopatologia;
use Acme\Controller\Printer\Bases\PDF;

class HistoPrintConfig
{
    public $isLastPage = false;


    function __construct()
    {
        $this->ConvertCharacters = new PdfStringConversor();
    }

    public function Close()
    {
        $this->last_page_flag = true;
        parent::Close();
    }

    public function lastPage($resetmargins = false)
    {
        $this->setPage($this->getNumPages(), $resetmargins);
        $this->isLastPage = true;
    }

    public function printPdfHitoReport(Histopatologia $data)
    {
        $ftitle = $data->serial . "-" . $data->created_at->format('Y');
        $pdf = new PDF($orientation = 'P', $unit = 'mm', $size = 'Letter', $ftitle = $ftitle, $data);
        $pdf->SetHeaderMargin(28);
        $pdf->setFooterMargin(20);
        $pdf->SetMargins(5, 28, 5);


        $pdf->SetLeftMargin(5);
        $pdf->SetRightMargin(5);

        $pdf->SetTopMargin(68);

        $pdf->AddPage();

        //$this->PrintHeader($data, $pdf);
        $pdf->SetAutoPageBreak(true, 30);
        $this->PrintBody($data, $pdf);

        if (isset($data->images[0])) {

            $pdf->SetTopMargin(30);
            $pdf->AddPage();
            $this->PrintImages($data, $pdf);
        }

        //$pdf->IncludeJS("print('true');");
        return $pdf->Output();
    }

    /**
     * @param Histopatologia $data
     * @param $pdf
     */
    protected function PrintBody(Histopatologia $data, $pdf)
    {
        /**
         * Salto
         */
        $pdf->ln();

        /**
         *  INFORME
         */
        $pdf->SetFont('Helvetica', 'B', 13);
        $pdf->Cell(205, 5, 'INFORME', 0, 0, 'C');

        /**
         * Salto
         */
        $pdf->ln();

        $pdf->SetFont('Helvetica', '', 10);
        $pdf->writeHTMLCell(120, '', '', '', $data->informe, 0, 0, FALSE, false, 'J', true);
        $pdf->SetXY(135, 75);
        $pdf->Cell(55, 55, "Imagen", 1, 0);
        $pdf->SetXY(135, 126);
        $pdf->Cell(55, 55, "Imagen", 1, 0);
        $pdf->SetXY(135, 176);
        $pdf->Cell(55, 55, "Imagen", 1, 0);
    }

    /**
     * @param $pdf
     */
    protected function PrintImages($data, $pdf)
    {

        /**
         * Imagenes
         */

        if (isset($data->images[0])) {
            $pdf->Cell(85, 5, $pdf->Image(public_path() . "/img/histo/" .
                $data->images[0]->image_url, $pdf->GetX(), $pdf->GetY(), 80, 65), 0, '');
        }

        if (isset($data->images[1])) {
            $pdf->SetX(105);
            $pdf->Cell(85, 5, $pdf->Image(public_path() . "/img/histo/" .
                $data->images[1]->image_url, $pdf->GetX(), $pdf->GetY(), 80, 65), 0, '');
        }

        if (isset($data->images[0])) {
            $pdf->ln(70);
            $x = $pdf->GetX();
            $y = $pdf->GetY();
            $pdf->SetFont('Helvetica', '', 10);
            $pdf->MultiCell(80, 4, $data->images[0]->descripcion, 0, 'J');
        }

        if (isset($data->images[1])) {
            $pdf->SetXY($x + 85, $y);
            $pdf->MultiCell(80, 4, $data->images[1]->descripcion, 0, 'J');
        }

        if (isset($data->images[2])) {
            $pdf->ln(20);
            $pdf->Cell(85, 5, $pdf->Image(public_path() . "/img/histo/" .
                $data->images[2]->image_url, $pdf->GetX(), $pdf->GetY(), 80, 65), 0, '');
        }

        if (isset($data->images[3])) {
            $pdf->SetX(105);
            $pdf->Cell(85, 5, $pdf->Image(public_path() . "/img/histo/" .
                $data->images[3]->image_url, $pdf->GetX(), $pdf->GetY(), 80, 65), 0, '');
        }

        if (isset($data->images[2])) {
            $pdf->ln(70);
            $x2 = $pdf->GetX();
            $y2 = $pdf->GetY();
            $pdf->MultiCell(80, 4, $data->images[2]->descripcion, 0, 'J');
        }

        if (isset($data->images[3])) {
            $pdf->SetXY($x2 + 85, $y2);
            $pdf->MultiCell(80, 4, $data->images[3]->descripcion, 0, 'J');

        }

    }
}

































