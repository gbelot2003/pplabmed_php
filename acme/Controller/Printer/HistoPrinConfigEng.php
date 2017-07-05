<?php

namespace Acme\Controller\Printer;

use Acme\Helpers\PdfStringConversor;
use App\Histopatologia;
use Acme\Controller\Printer\Bases\PDF;
use Dedicated\GoogleTranslate;

class HistoPrinConfigEng {
    function __construct()
    {
        $this->ConvertCharacters = new PdfStringConversor();
    }

    public function printPdfHitoReport(Histopatologia $data)
    {

        list($diagnostico, $informe, $muestra) = $this->TranslateText($data);

        $ftitle =  $data->serial . "-" . $data->created_at->format('Y');
        $pdf = new PDF($orientation = 'P', $unit = 'mm', $size = 'Letter', $ftitle = $ftitle);
        setlocale(LC_CTYPE, 'es_ES');


        $pdf->SetLeftMargin(5);
        $pdf->SetRightMargin(5);
        $pdf->AliasNbPages();

        $pdf->SetTopMargin(30);
        $pdf->AddPage();

        $this->PrintHeader($data, $pdf, $diagnostico, $muestra);
        $this->PrintBody($data, $pdf, $informe);

        if(isset($data->images[0])){

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
    protected function PrintHeader(Histopatologia $data, $pdf, $diagnostico, $muestra)
    {
        /**
         * Cabezera
         */
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(205, 10, $this->ConvertCharacters->convert("HISTOPATHOLOGY REPORT"), 0,  0, 'C');

        /**
         * Salto
         */
        $pdf->ln();

        /**
         * Nombre
         */
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(22, 5, 'PATIENT: ', 0, 0, 'L');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(118, 5, $this->ConvertCharacters->convert(strtoupper($data->facturas->nombre_completo_cliente)), 0, 0, 'L');

        /**
         * Edad
         */
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(12, 5, 'AGE: ', 0, 0, 'L');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(15, 5, $data->facturas->edad, 0, 0, 'L');

        /**
         * Sexo
         */
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(12, 5, 'SEX: ', 0, 0, 'L');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(15, 5, $data->facturas->sexo, 0, 0, 'L');

        /**
         * Salto
         */
        $pdf->ln();

        /**
         * Medico
         */
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(22, 5, $this->ConvertCharacters->convert('DOCTOR: '), 0, 0, 'L');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(118, 5, $this->ConvertCharacters->convert(strtoupper($data->facturas->medico)), 0, 0, 'L');

        /**
         * Fecha de Biopsia
         */
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(30, 5, $this->ConvertCharacters->convert('BIOPSY DATE') .': ', 0, 0, 'L');

        if($data->fecha_biopcia){
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(20, 5, $data->fecha_biopcia->formatLocalized('%d/%m/%Y'), 0, 0, 'L');
        }


        /**
         * Salto
         */
        $pdf->ln();

        /**
         * Dirección
         */
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(22, 5, $this->ConvertCharacters->convert('ADDRESS:'), 0, 0, 'L');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(118, 5, $this->ConvertCharacters->convert($data->facturas->direccion_entrega_sede), 0, 0, 'L');


        /**
         * Muestra Recibida
         */
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(30, 5, $this->ConvertCharacters->convert('RECEIVED:'), 0, 0, 'R');

        $pdf->SetFont('Arial', 'B', 10);
        if($data->fecha_muestra){
            $pdf->Cell(78, 5, $data->fecha_muestra->formatLocalized('%d/%m/%Y'), 0, 0, 'L');
        } else {
            $pdf->Cell(125, 5, " ", 0, 0, 'L');
        }


        /**
         * Salto
         */
        $pdf->ln();

        /**
         * Diagnostico
         */
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(26, 5, $this->ConvertCharacters->convert('CLINICAL DIAG.') .': ', 0, 0, 'L');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(171, 5, $this->ConvertCharacters->convert(strtoupper($diagnostico)), 0, 'L', false);

        /**
         * Salto
         */
        $pdf->ln();

        /**
         * Material Estudiado
         */
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(41, 5, $this->ConvertCharacters->convert('STUDIED MATERIAL') .': ', 0, 0, 'L');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(121  , 5, $this->ConvertCharacters->convert(strtoupper($muestra)), 0, 0, 'L');

        /**
         * Salto
         */
        $pdf->ln();


        /**
         * Numero de Biopsia
         */
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(165, 5, $this->ConvertCharacters->convert('No. BIOPSY') .': ', 0, 0, 'R');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(30, 5,  $data->serial. "-" .$data->created_at->format('Y'), 0, 0, 'L');

        /**
         * Salto
         */
        $pdf->ln();

        /**
         * Numero de Factura
         */
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(165, 5, $this->ConvertCharacters->convert('C.I.') . ' ', 0, 0, 'R');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(30, 5, $data->facturas->num_factura, 0, 0, 'L');
    }

    /**
     * @param Histopatologia $data
     * @param $pdf
     */
    protected function PrintBody(Histopatologia $data, $pdf, $informe)
    {
        /**
         * Salto
         */
        $pdf->ln();

        /**
         *  INFORME
         */
        $pdf->SetFont('Arial', 'B', 13);
        $pdf->Cell(205, 5, 'REPORT', 0,  0, 'C');

        /**
         * Salto
         */
        $pdf->ln();

        $pdf->SetFont('Arial', '', 10);
        $pdf->MultiCell(197, 5,
            strip_tags(utf8_decode(html_entity_decode($informe)))
            , 0, 'J', false);

        if(!isset($data->images[0])){

            $pdf->ln(75);
            $pdf->Cell(45, 5, "Report Date:" , 0, '');
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(75, 5, $data->firma->name , 0, 0, 'C');
            if (isset($data->firma2)){
                $pdf->Cell(75, 5, $data->firma2->name , 0, 0, 'C');
            }
            $pdf->SetFont('Arial', '', 10);
            $pdf->ln();
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(45, 5, $data->fecha_informe->formatLocalized('%d/%m/%Y') , 0, '');
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(75, 5, $data->firma->collegiate , 0, 0, 'C');
            if (isset($data->firma2)) {
                $pdf->Cell(75, 5, $data->firma2->collegiate, 0, 0, 'C');
            }
            if ($data->firma->extra){
                $pdf->ln();
                $pdf->Cell(45, 5, "" , 0, '');
                $pdf->Cell(75, 5, $data->firma->extra ,0, 0, 'C');
                if (isset($data->firma2->extra)){
                    $pdf->Cell(75, 5, $data->firma2->extra , 0, 0, 'C');
                }
                $pdf->ln();
            }
        }
    }

    /**
     * @param $pdf
     */
    protected function PrintImages($data, $pdf)
    {

        /**
         * Imagenes
         */

        if(isset($data->images[0])){
            $pdf->Cell(85, 5, $pdf->Image(public_path() . "/img/histo/" .
                $data->images[0]->image_url, $pdf->GetX(), $pdf->GetY(), 80, 65) , 0, '');
        }

        if (isset($data->images[1])){
            $pdf->SetX(105);
            $pdf->Cell(85, 5, $pdf->Image(public_path() . "/img/histo/" .
                $data->images[1]->image_url, $pdf->GetX(), $pdf->GetY(), 80, 65) , 0, '');
        }

        if (isset($data->images[0])){
            $pdf->ln(70);
            $x = $pdf->GetX();
            $y = $pdf->GetY();
            $pdf->SetFont('Arial', '', 10);
            $pdf->MultiCell(80, 4, $data->images[0]->descripcion, 0, 'J');
        }

        if (isset($data->images[1])){
            $pdf->SetXY($x + 85, $y);
            $pdf->MultiCell(80, 4, $data->images[1]->descripcion, 0, 'J');
        }

        if (isset($data->images[2])){
            $pdf->ln(20);
            $pdf->Cell(85, 5, $pdf->Image(public_path() . "/img/histo/" .
                $data->images[2]->image_url, $pdf->GetX(), $pdf->GetY(), 80, 65) , 0, '');
        }

        if (isset($data->images[3])){
            $pdf->SetX(105);
            $pdf->Cell(85, 5, $pdf->Image(public_path() . "/img/histo/" .
                $data->images[3]->image_url, $pdf->GetX(), $pdf->GetY(), 80, 65) , 0, '');
        }

        if (isset($data->images[2])){
            $pdf->ln(70);
            $x2 = $pdf->GetX();
            $y2 = $pdf->GetY();
            $pdf->MultiCell(80, 4, $data->images[2]->descripcion, 0, 'J');
        }

        if (isset($data->images[3])){
            $pdf->SetXY($x2 + 85, $y2);
            $pdf->MultiCell(80, 4, $data->images[3]->descripcion, 0, 'J');

        }

        /**
         * Firmas
         */
        if (isset($data->images[2])){
            $pdf->ln(25);
        } else {
            $pdf->ln(125);
        }

        $pdf->Cell(45, 5, "Report Date:" , 0, '');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(65, 5, $data->firma->name , 0, '');
        if (isset($data->firma2)){
            $pdf->Cell(55, 5, $data->firma2->name , 0, '');
        }
        $pdf->SetFont('Arial', '', 10);
        $pdf->ln();
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(45, 5, $data->fecha_informe->formatLocalized('%d/%m/%Y') , 0, '');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(65, 5, $data->firma->collegiate , 0, '');
        if (isset($data->firma2)) {
            $pdf->Cell(55, 5, $data->firma2->collegiate, 0, '');
        }
        if ($data->firma->extra){
            $pdf->ln();
            $pdf->Cell(45, 5, "" , 0, '');
            $pdf->Cell(65, 5, $data->firma->extra ,0, '');
            if (isset($data->firma2->extra)){
                $pdf->Cell(75, 5, $data->firma2->extra , 0, '');
            }
            $pdf->ln();
        }
    }

    /**
     * @param Histopatologia $data
     * @return array
     */
    protected function TranslateText(Histopatologia $data)
    {
        $translator = new GoogleTranslate\Translator();

        if ($data->diagnostico) {
            $diagnostico = $translator->setSourceLang('es')
                ->setTargetLang('en')
                ->translate($data->diagnostico);
        } else {
            $diagnostico = null;
        }

        if ($data->informe) {
            $informe = $translator->setSourceLang('es')
                ->setTargetLang('en')
                ->translate($data->informe);
        } else {
            $informe = null;
        }

        if ($data->muestra) {
            $muestra = $translator->setSourceLang('es')
                ->setTargetLang('en')
                ->translate($data->muestra);
        } else {
            $muestra = null;
        }

        return array($diagnostico, $informe, $muestra);
    }
}