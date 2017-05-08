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
     * @param FacturasValidate $request
     * @param $examenes
     */
    public function saveExamenes(FacturasValidate $request, $examenes)
    {
        if (array_key_exists('item', $examenes['examen'])) {
            $examen = Examenes::create([
                'item' => $examenes['examen']['item'],
                'num_factura' => $request->get('num_factura'),
                'nombre_examen' => $examenes['examen']['nombre_examen']
            ]);
        } else {
            foreach ($examenes['examen'] as $ind => $val) {
                $examen = Examenes::create([
                    'item' => $val['item'],
                    'num_factura' => $request->get('num_factura'),
                    'nombre_examen' => $val['nombre_examen']
                ]);
            }
        }
    }
}
