<?php

namespace Acme\Refactoria\Queries;

use Acme\Refactoria\Interfaces\RepositoryQueryInterface;
use App\Citologia;
use App\Factura;

class IdentificadorQuery implements RepositoryQueryInterface
{
    /**
     * IdentificadorQuery constructor.
     */
    function __construct()
    {
        $this->facturas = new Factura();
    }

    /**
     * @param $bdate
     * @param $edate
     * @return array
     */
    public function output($bdate, $edate)
    {
        $a = $this->abstractQuery($bdate, $edate, 0, 14);
        $b = $this->abstractQuery($bdate, $edate, 15, 19);
        $c = $this->abstractQuery($bdate, $edate, 20, 24);
        $d = $this->abstractQuery($bdate, $edate, 25, 29);
        $e = $this->abstractQuery($bdate, $edate, 30, 35);
        $f = $this->abstractQuery($bdate, $edate, 36, 39);
        $g = $this->abstractQuery($bdate, $edate, 40, 44);
        $h = $this->abstractQuery($bdate, $edate, 45, 49);
        $i = $this->abstractQuery($bdate, $edate, 50, 54);
        $j = $this->abstractQuery($bdate, $edate, 55, 59);
        $k = $this->abstractQuery($bdate, $edate, 60, 200);

        $totales = $this->AbstractTotales($bdate, $edate);

        return array($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $totales);
    }

    /**
     * @param $bdate
     * @param $edate
     * @param $byears
     * @param $eyeard
     * @return mixed
     */
    protected function abstractQuery($bdate, $edate, $byears, $eyeard)
    {
        $query = $this->facturas->join('Citologias as c', 'c.factura_id', '=', 'facturas.num_factura')
            ->join('examenes as x', 'x.num_factura', '=', 'facturas.num_factura')
            ->selectRaw("SUM(IF(c.icitologia_id = 2, 1, 0)) as ID2,
                SUM(IF(c.icitologia_id = 3, 1, 0)) as ID3,
                SUM(IF(c.icitologia_id = 4, 1, 0)) as ID4,
                SUM(IF(c.icitologia_id = 9, 1, 0)) as ID9,
                SUM(IF(c.icitologia_id = 6, 1, 0)) as ID6,
                SUM(IF(c.icitologia_id = 10, 1, 0)) as ID10,
                SUM(IF(x.item=10327  OR x.item=10328, 1, 0)) as bs,
                COUNT(facturas.id) as total")
            ->where('c.icitologia_id', '!=', 1)
            ->where('c.icitologia_id', '!=', 7)
            ->where('c.icitologia_id', '!=', 8)
            ->where('c.icitologia_id', '!=', 10)
            ->whereBetween('c.fecha_informe', [$bdate, $edate])
            ->whereRaw("date_format(FROM_DAYS(DATEDIFF(now(), facturas.fecha_nacimiento)), '%Y')+0 BETWEEN " . $byears . " AND " . $eyeard . "");

        return $query->get();
    }

    /**
     * @param $bdate
     * @param $edate
     * @return mixed
     */
    protected function AbstractTotales($bdate, $edate)
    {
        $totales = $this->facturas->join('Citologias as c', 'c.factura_id', '=', 'facturas.num_factura')
            ->join('examenes as x', 'x.num_factura', '=', 'facturas.num_factura')
            ->selectRaw("SUM(IF(c.icitologia_id = 2, 1, 0)) as ID2,
                SUM(IF(c.icitologia_id = 3, 1, 0)) as ID3,
                SUM(IF(c.icitologia_id = 4, 1, 0)) as ID4,
                SUM(IF(c.icitologia_id = 9, 1, 0)) as ID9,
                SUM(IF(c.icitologia_id = 6, 1, 0)) as ID6,
                SUM(IF(c.icitologia_id = 10, 1, 0)) as ID10,
                SUM(IF(x.item=10327  OR x.item=10328, 1, 0)) as bs,
                COUNT(facturas.id) as total")
            ->where('c.icitologia_id', '!=', 1)
            ->where('c.icitologia_id', '!=', 7)
            ->where('c.icitologia_id', '!=', 8)
            ->where('c.icitologia_id', '!=', 10)
            ->whereBetween('c.fecha_informe', [$bdate, $edate])
            ->get();
        return $totales;
    }
}