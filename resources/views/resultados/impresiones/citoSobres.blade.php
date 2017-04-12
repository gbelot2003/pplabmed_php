@extends('layouts.sobres')
@section('content')
    <style type="text/css">
        body{
            margin-top:2.5cm;
            margin-left: 1.5cm;
        }
        #sobre{
            width: 14.5cm;
            height: 6cm;
        }
        .medico{}
    </style>
    <div id="sobre">
        <span class="medico">{{ $items->facturas->medico }}</span>
        <span class="serial">{{ $items->serial }}</span>
        <span class="direccion_entrega_sede">{{ $items->facturas->direccion_entrega_sede }}</span>
        <span class="nombre_completo_cliente">{{ $items->facturas->nombre_completo_cliente }}</span>
        <span class="correo">{{ $items->facturas->correo }}</span>
        <span class="correo2">{{ $items->facturas->correo2 }}</span>
    </div>
@stop