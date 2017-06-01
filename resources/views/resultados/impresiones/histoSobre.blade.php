@extends('layouts.sobres')
@section('content')
    <link rel="stylesheet" href="/css/print_cito_sobre.css">
    <div id="sobre">
        <span class="no-print"><a class="imprimir" onclick="window.print();" href="#">Imprimir</a></span>
        <span class="medico parte">{{ $items->facturas->medico }}</span>
        <span class="serial parte">{{ $items->serial }}</span>
        <span class="direccion_entrega_sede parte strong">{{ $items->facturas->direccion_entrega_sede }}</span>
        <span class="etiqueta parte">Informe de los Examenes de:</span>
        <span class="nombre_completo_cliente parte">{{ $items->facturas->nombre_completo_cliente }}</span>
        <span class="correo parte strong">{{ $items->facturas->correo }}</span>
        <span class="correo2 parte strong">{{ $items->facturas->correo2 }}</span>
    </div>
@stop