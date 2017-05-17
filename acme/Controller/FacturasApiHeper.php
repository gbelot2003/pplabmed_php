<?php
namespace Acme\Controller;

use App\Examenes;
use App\Http\Requests\FacturasValidate;

Class FacturasApiHeper {

    /**
     * @param $edad
     * @return false|string
     */
    public function setFecha($edad){
        return date('Y-m-d H:i:s', strtotime($edad));
    }

    /**
     * @param $edad
     * @return int
     */
    public function setEdad($edad){
        return intval(date('Y', time() - strtotime($edad))) - 1970;
    }

    /**
     * @param $examenes
     * @param $num_factura
     */
    public function saveExamenes($examenes, $num_factura)
    {
        if(array_key_exists(0, $examenes) ) {
            foreach ($examenes as $val) {
                $examen = Examenes::create( [
                    'item' => $val['codigo_examen'],
                    'num_factura' => $num_factura,
                    'nombre_examen' => $val['nombre_examen']
                ] );
            }
        }  else {
            $examen = Examenes::create( [
                'item' => $examenes['codigo_examen'],
                'num_factura' => $num_factura,
                'nombre_examen' => $examenes['nombre_examen']
            ] );
        }
    }
}
