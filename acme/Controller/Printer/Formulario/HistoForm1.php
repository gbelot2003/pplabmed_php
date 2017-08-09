<?php

namespace Acme\Controller\Printer\Formulario;

use Acme\Helpers\PdfStringConversor;
use App\Histopatologia;
use Acme\Controller\Printer\Bases\PDF;

class HistoForm1
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
        //dd($data->informe);
        if (count($data->images) > 0 && count($data->images) <= 3) {

            $s = strstr($data->informe, "<div style=\"page-break-after:always\"><span style=\"display:none\">&nbsp;</span></div>");
            $b = strstr($data->informe, "<div style=\"page-break-after:always\"><span style=\"display:none\">&nbsp;</span></div>", true);
            $result = str_replace("<div style=\"page-break-after:always\"><span style=\"display:none\">&nbsp;</span></div>", "", $b);
            $result1 = str_replace("<div style=\"page-break-after:always\"><span style=\"display:none\">&nbsp;</span></div>", "", $s);
            $result2 = str_replace("<br />", "", $result1);


            if (count($data->images) == 1) {

                $pdf->SetFont('Helvetica', '', 10);
                $pdf->writeHTMLCell(120, '', '', '', $result, 0, 0, FALSE, false, 'J', true);

                $pdf->ln();
                $pdf->writeHTMLCell(192, '', '', '', $result2, 0, 0, FALSE, false, 'J', true);

                $pdf->Image(public_path() . "/img/histo/" . $data->images[0]->image_url, 135, 75, 60, 50, '', '', '', true, 150, '', false, false, 1, false, false, false);


            }

            if (count($data->images) == 2) {

                $pdf->SetFont('Helvetica', '', 10);
                $pdf->writeHTMLCell(120, '', '', '', $result, 0, 0, FALSE, false, 'J', true);


                $pdf->ln();
                $pdf->writeHTMLCell(192, '', '', '', $result2, 0, 0, FALSE, false, 'J', true);

                $pdf->Image(public_path() . "/img/histo/" . $data->images[0]->image_url, 135, 75, 60, 50, '', '', '', true, 150, '', false, false, 1, false, false, false);

                $pdf->Image(public_path() . "/img/histo/" . $data->images[1]->image_url, 135, 126, 60, 50, '', '', '', true, 150, '', false, false, 1, false, false, false);


            }

            if (count($data->images) == 3) {

                $pdf->SetFont('Helvetica', '', 10);
                $pdf->writeHTMLCell(120, '', '', '', $result, 0, 0, FALSE, false, 'J', true);


                $pdf->ln();
                $pdf->writeHTMLCell(192, '', '', '', $result2, 0, 0, FALSE, false, 'J', true);

                $pdf->Image(public_path() . "/img/histo/" . $data->images[0]->image_url, 135, 75, 60, 50, '', '', '', true, 150, '', false, false, 1, false, false, false);

                $pdf->Image(public_path() . "/img/histo/" . $data->images[1]->image_url, 135, 126, 60, 50, '', '', '', true, 150, '', false, false, 1, false, false, false);

                $pdf->Image(public_path() . "/img/histo/" . $data->images[2]->image_url, 135, 177, 60, 50, '', '', '', true, 150, '', false, false, 1, false, false, false);
            }

        } else {
            $pdf->SetFont('Helvetica', '', 10);
            $pdf->writeHTMLCell(192, '', '', '', $data->informe, 0, 0, false, false, 'J', true);

        }
    }
}

































