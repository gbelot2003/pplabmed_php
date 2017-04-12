@extends('layouts.formularios')
@section('content')
    <style type="text/css">
        body{
            margin-top:2.5cm;
            margin-left: 1.5cm;
        }
        #formulario{
            width: 14.5cm;
            height: 6cm;
        }
        .medico{}
    </style>
    <div id="formulario">
        <span class="serial">{{ $items->facturas->nombre_completo_cliente }}</span>
        <span class="serial">{{ $items->facturas->edad }}</span>
        <span class="serial">{{ $items->facturas->direccion_entrega_sede }}</span>
        <h4>SOLICITUD PARA ESTUDIO CITOLOGICO</h4>
        <span>Detección de Cancer</span>
        <span>Indice de Maduración</span>
        <span>Otros</span>
        <h4>DIAGNOSTICO CLINICO</h4>

        <span class="serial">{{ $items->fur }}</span>
        <span class="serial">{{ $items->fup }}</span>
        <span class="serial">{{ $items->gravidad }}</span>
        <span class="serial">{{ $items->para }}</span>
        <span class="serial">{{ $items->abortos }}</span>

        <h4>MATERIAL ENVIADO</h4>

        <span>Fecha de Muestra</span>
        <span>Medico Remitente</span>

        <span class="serial">{{ $items->factura_id }}</span>
        <h5>INFORME SISTEMA BETHESDA</h5>
        <span class="serial">{{ $items->serial }}</span>

        <div class="mm">
            <h6>/MM</h6>
            <span>La citología vaginal es un metodo de ayuda para seleccionar y detectar pacientes con lesiones premalignas y malignas del área genital.
            No debe ser usado como unico método oara diagnostico de cáncer gnenital. Resultados falsos positivos y falsos negativos pueden ocurrrir.
            Si usted tiene alguna duda sobre su examen, se sugiere consultar con su medico</span>
        </div>

        <span class="serial">{{ $items->fecha_informe}}</span>
    </div>



@stop