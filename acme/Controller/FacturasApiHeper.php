<?php
namespace Acme\Controller;

use App\Audit;
use App\Examenes;
use App\Http\Requests\FacturasValidate;

Class FacturasApiHeper {

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
                ]);

                Audit::create([
                    'title' => 'Examen API',
                    'action' => 'creación',
                    'details' => 'Examen: ' . $examen->num_factura . "Item: " . $val['codigo_examen'],
                    'user_id' => 1
                ]);
            }
        }  else {
            $examen = Examenes::create( [
                'item' => $examenes['codigo_examen'],
                'num_factura' => $num_factura,
                'nombre_examen' => $examenes['nombre_examen']
            ]);

            Audit::create([
                'title' => 'Examen API',
                'action' => 'creación',
                'details' => 'Examen: ' . $examen->num_factura . "Item: " . $examenes['codigo_examen'],
                'user_id' => 1
            ]);

            if(!$examen->exist){
                Audit::create([
                    'title' => 'Examen API Fail',
                    'action' => 'Creacion error',
                    'details' => 'Examen: ' . $examen->num_factura . "Item: " . $examenes['codigo_examen'],
                    'user_id' => 1
                ]);
            }
        }
    }
}
