<?php
namespace Acme\Controller;

use App\Citologia;
use Illuminate\Http\Request;

Class CitologiaControllerHelper {

    /**
     * @param $serial
     * @param $factura_id
     * @param $nombre
     * @param $edad
     * @param $sexo
     * @param $correo
     * @param $correo2
     * @param $direccion
     * @param $medico
     * @param $otros
     * @param $gravidad
     * @param $icito
     * @param $para
     * @param $abortos
     * @param $fur
     * @param $fup
     * @param $finfo
     * @param $fmues
     * @param $firma1
     * @param $firma2
     * @param $otrosb
     * @param $informe
     * @param $diagnostico
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function contrucPagination($serial, $factura_id, $nombre, $edad, $sexo, $correo, $correo2, $direccion,
                                       $medico, $otros, $gravidad, $icito, $para, $abortos, $fur, $fup, $finfo, $fmues,
                                       $firma1, $firma2, $otrosb, $informe, $diagnostico)
    {
        $query = Citologia::with('facturas');

        if ($serial != 'null') {
            $query->where('serial', $serial);
        }

        if ($factura_id != 'null') {
            $query->where('factura_id', $factura_id);
        }

        if ($nombre != 'null') {
            $query->whereHas('facturas', function ($q) use ($nombre) {
                $q->Where('nombre_completo_cliente', 'like', '%' . $nombre . '%');
            });
        }

        if ($edad != 'null') {
            $query->whereHas('facturas', function ($q) use ($edad) {
                $q->where('edad', $edad);
            });
        }

        if ($sexo != 'null') {
            $query->whereHas('facturas', function ($q) use ($sexo) {
                $q->where('sexo', $sexo);
            });
        }

        if ($correo != 'null') {
            $query->whereHas('facturas', function ($q) use ($correo) {
                $q->where('correo', 'like', '%' . $correo . '%');
            });
        }

        if ($correo2 != 'null') {
            $query->whereHas('facturas', function ($q) use ($correo2) {
                $q->where('correo2', 'like', '%' . $correo2 . '%');
            });
        }

        if ($direccion != 'null') {
            $query->whereHas('facturas', function ($q) use ($direccion) {
                $q->where('direccion_entrega_sede', 'like', '%' . $direccion . '%');
            });
        }


        if ($medico != 'null') {
            $query->whereHas('facturas', function ($q) use ($medico) {
                $q->where('medico', 'like', '%' . $medico . '%');
            });
        }

        if ($otros != 'null') {
            $query->where('otros_a', 'like', '%' . $otros . '%');
        }

        if ($icito != 'null') {
            $query->where('icitologia_id', $icito);
        }

        if ($gravidad != 'null') {
            $query->where('gravidad', 'like', '%' . $gravidad . '%');
        }

        if ($para != 'null') {
            $query->where('gravidad', $para);
        }

        if ($abortos != 'null') {
            $query->where('abortos', $abortos);
        }

        if ($fur != 'null') {
            $query->where('fur', $fur);
        }

        if ($fup != 'null') {
            $query->where('fup', $fup);
        }

        if ($finfo != 'null') {
            $query->where('fecha_informe', $finfo);
        }

        if ($fmues != 'null') {
            $query->where('fecha_muestra', $fmues);
        }

        if ($firma1 != 'null') {
            $query->where('firma_id', $firma1);
        }

        if ($firma2 != 'null') {
            $query->where('firma_id', $firma2);
        }

        if ($otrosb != 'null') {
            $query->where('otros_b', 'like', '%' . $otrosb . '%');
        }

        if ($informe != 'null') {
            $query->where('informe', 'like', '%' . $informe . '%');
        }

        if ($diagnostico != 'null') {
            $query->where('diagnostico', 'like', '%' . $diagnostico . '%');
        }

        $items = $query->paginate(1);
        return $items;
    }

    /**
     * @param Request $request
     * @return string
     */
    public function ProcessFormVariables(Request $request)
    {
        $request->get('serial') ? $serial = $request->get('serial') : $serial = 'null';
        $request->get('factura_id') ? $factura_id = $request->get('factura_id') : $factura_id = 'null';
        $request->get('nombre_completo_cliente') ? $nombre = $request->get('nombre_completo_cliente') : $nombre = 'null';
        $request->get('edad') ? $edad = $request->get('edad') : $edad = 'null';
        $request->get('sexo') ? $sexo = $request->get('sexo') : $sexo = 'null';
        $request->get('correo') ? $correo = $request->get('correo') : $correo = 'null';
        $request->get('correo2') ? $correo2 = $request->get('correo2') : $correo2 = 'null';
        $request->get('direccion_entrega_sede') ? $direccion = $request->get('direccion_entrega_sede') : $direccion = 'null';
        $request->get('medico') ? $medico = $request->get('medico') : $medico = 'null';

        $request->get('otros_a') ? $otros = $request->get('otros_a') : $otros = 'null';
        $request->get('gravidad') ? $gravidad = $request->get('gravidad') : $gravidad = 'null';
        $request->get('icitologia_id') ? $icito = $request->get('icitologia_id') : $icito = 'null';
        $request->get('para') ? $para = $request->get('para') : $para = 'null';
        $request->get('abortos') ? $abortos = $request->get('abortos') : $abortos = 'null';
        $request->get('fur') ? $fur = $request->get('fur') : $fur = 'null';
        $request->get('fup') ? $fup = $request->get('fup') : $fup = 'null';
        $request->get('fecha_informe') ? $finfo = $request->get('fecha_informe') : $finfo = 'null';
        $request->get('fecha_muestra') ? $fmues = $request->get('fecha_muestra') : $fmues = 'null';
        $request->get('firma_id') ? $firma1 = $request->get('firma_id') : $firma1 = 'null';
        $request->get('firma2_id') ? $firma2 = $request->get('firma2_id') : $firma2 = 'null';
        $request->get('otros_b') ? $otrosb = $request->get('otros_b') : $otrosb = 'null';
        $request->get('informe') ? $informe = $request->get('informe') : $informe = 'null';
        $request->get('diagnostico') ? $diagnostico = $request->get('diagnostico') : $diagnostico = 'null';

        $url = 'citologia/resultados/' . $serial . '/' . $factura_id . '/' . $nombre . '/' . $edad . '/' . $sexo . '/' . $correo . '/' . $correo2 . '/' . $direccion . '/' . $medico . '/' . $otros . '/' . $gravidad . '/' . $icito . '/' . $para . '/' . $abortos . '/' . $fur . '/' . $fup . '/' . $finfo . '/' . $fmues . '/' . $firma1 . '/' . $firma2 . '/' . $otrosb . '/' . $informe . '/' . $diagnostico;
        return $url;
    }
}