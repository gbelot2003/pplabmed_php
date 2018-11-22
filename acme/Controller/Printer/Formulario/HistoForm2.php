<?php

namespace Acme\Controller\Printer\Formulario;

use Acme\Helpers\PdfStringConversor;
use App\Histopatologia;
use Acme\Controller\Printer\Bases\PDFImges as PDF;

class HistoForm2
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
        $ftitle = $data->serial . "-" . $data->fecha_informe->format('Y');
        $pdf = new PDF($orientation = 'P', $unit = 'mm', $size = 'Letter', $ftitle = $ftitle, $data);
        $pdf->SetHeaderMargin(33);
        $pdf->setFooterMargin(20);
        $pdf->SetMargins(5, 40, 5);
        $pdf->setImageScale(1.63);


        $pdf->SetLeftMargin(5);
        $pdf->SetRightMargin(5);

        $pdf->SetTopMargin(85);

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

        if (count($data->images) > 0 && count($data->images) <= 3) {

            $s = strstr($data->informe, "<div style=\"page-break-after:always\"><span style=\"display:none\">&nbsp;</span></div>");
            $b = strstr($data->informe, "<div style=\"page-break-after:always\"><span style=\"display:none\">&nbsp;</span></div>", true);
             $result = str_replace("<div style=\"page-break-after:always\"><span style=\"display:none\">&nbsp;</span></div>", "", $b);
             $result2 = str_replace("<div style=\"page-break-after:always\"><span style=\"display:none\">&nbsp;</span></div>", "", $s);
             $result3 = preg_replace('/$(\r\n\r\n)/', '', $result2);

            //dd($result3);
            if (count($data->images) == 1) {

                $pdf->SetFont('Helvetica', '', 10);
                $pdf->writeHTMLCell(130, '', '', '', $result, 0, 0, false, false, 'J', true);

                $pdf->ln();
                $pdf->SetFont('Helvetica', '', 10);
                $pdf->writeHTMLCell(192, '', '', '', $result3, 0, 0, false, true, 'J', true);

                $pdf->setJPEGQuality(100);
                $pdf->setImageScale(1.63);
                $pdf->Image(public_path() . "/img/histo/" . $data->images[0]->image_url, 149, 82, 56, 60, '', '', '', true, 150, '', false, false, 0, false, false, false);
                //$pdf->writeHTMLCell(60, 10, 135, 112, $data->images[0]->descripcion, 0, 0, false, false, 'J', TRUE);
                $pdf->SetXY(150,139);
                $pdf->Cell(60, 10, $data->images[0]->descripcion, 0,  0, 'L');


            }

            if (count($data->images) == 2) {

                $pdf->SetFont('Helvetica', '', 10);
                $pdf->writeHTMLCell(135, '', '', '', $result, 0, 0, false, false, 'J', true);


                $pdf->ln();
                $pdf->SetFont('Helvetica', '', 10);
                $pdf->writeHTMLCell(192, '', '', '', $result2, 0, 0, false, true, 'J', true);

                $pdf->setJPEGQuality(100);
                $pdf->setImageScale(1.53);
                $pdf->Image(public_path() . "/img/histo/" . $data->images[0]->image_url, 149, 82, 56, 60, '', '', '', true, 150, '', false, false, 0, false, false, false);
                $pdf->SetXY(150,140);
                $pdf->Cell(60, 10, $data->images[0]->descripcion, 0,  0, 'L');

                $pdf->setJPEGQuality(100);
                $pdf->setImageScale(1.53);
                $pdf->Image(public_path() . "/img/histo/" . $data->images[1]->image_url, 149, 148, 56, 60, '', '', '', true, 150, '', false, false, 0, false, false, false);
                $pdf->SetXY(150,206);
                $pdf->Cell(60, 10, $data->images[1]->descripcion, 0,  0, 'L');
            }

            if (count($data->images) == 3) {

                $pdf->SetFont('Helvetica', '', 10);
                $pdf->writeHTMLCell(142, '', '', '', $result, 0, 0, FALSE, false, 'J', true);


                $pdf->ln();
                $pdf->SetFont('Helvetica', '', 10);
                $pdf->writeHTMLCell(194, '', '', '', $result2, 0, 0, FALSE, true, 'J', true);

                $pdf->setJPEGQuality(100);
                $pdf->setImageScale(1.53);
                $pdf->Image(public_path() . "/img/histo/" . $data->images[0]->image_url, 165, 82, 41, 43, '', '', '', true, 150, '', false, false, 0, false, false, false);
                $pdf->SetXY(165,122);
                $pdf->Cell(60, 10, $data->images[0]->descripcion, 0,  0, 'L');

                $pdf->setJPEGQuality(100);
                $pdf->setImageScale(1.53);
                $pdf->Image(public_path() . "/img/histo/" . $data->images[1]->image_url, 165, 130, 41, 43, '', '', '', true, 150, '', false, false, 0, false, false, false);
                $pdf->SetXY(165,170);
                $pdf->Cell(60, 10, $data->images[1]->descripcion, 0,  0, 'L');

                $pdf->setJPEGQuality(100);
                $pdf->setImageScale(1.53);
                $pdf->Image(public_path() . "/img/histo/" . $data->images[2]->image_url, 165, 178, 41, 43, '', '', '', true, 150, '', false, false, 0, false, false, false);
                $pdf->SetXY(165,218);
                $pdf->Cell(60, 10, $data->images[2]->descripcion, 0,  0, 'L');
            }

        } else {
            $pdf->SetFont('Helvetica', '', 10);
            $pdf->writeHTMLCell(192, '', '', '', $data->informe, 0, 0, false, false, 'J', true);

        }
    }
}

































