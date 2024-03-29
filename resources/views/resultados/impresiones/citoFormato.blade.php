@extends('layouts.formularios')
@section('content')
    <link rel="stylesheet" href="/css/cito_form.css">
    <div id="formulario">
        <span class="no-print"><a class="imprimir" onclick="loadPrint()" href="#">Imprimir</a></span>
        <div id="cabezera">
            <span class="paciente-etiqueta parte">PACIENTE: <strong>{{ $items->facturas->nombre_completo_cliente }}</strong></span>
            <span class="edad-etiqueta parte">EDAD: <strong>{{ $items->facturas->edad }}</strong></span>
            <span class="sexo-etiqueta parte">SEXO: <strong>{{ $items->facturas->sexo }}</strong></span>
            <span class="direccion-etiqueta parte">DIRECCIÓN:</span>
            <span class="direccion parte"><strong>{{ $items->facturas->direccion_entrega_sede }}</strong></span>
            <span class="telefono-etiqueta parte">DOCTOR: <strong>{{ $items->facturas->medico }}</strong></span>
            <span CLASS="solicitud-etiqueta parte"><strong>SOLICITUD PARA ESTUDIO CITOLOGICO</strong></span>

            <span class="deteccion-etiqueta parte">DETECCIÓN DE CANCER:
                @if($items->deteccion_cancer == true)
                    <strong>X</strong>
                @endif
            </span>

            <span class="indice-maduracion-etiqueta parte">INDICE DE MADURACIÓN:
                @if($items->indice_maduracion == true)
                    <strong>X</strong>
                @endif
            </span>
            <span class="otros-etiqueta parte">OTROS: <strong>{{ $items->otros_a }}</strong></span>

            <span class="diagnostico-clinico-etiqueta parte"><strong>DIAGNOSTICO CLINICO:</strong> {{ $items->diagnostico }}</span>

            <span class="fur-etiqueta parte">F.U.R.: <strong>{{ isset($items->fur) ? $items->fur->formatLocalized('%d/%m/%Y') : "" }}</strong></span>
            <span class="fup-etiqueta parte">F.U.P.: <strong>{{ isset($items->fup) ?  $items->fup->formatLocalized('%d/%m/%Y') : ""}}</strong></span>
            <span class="gravidad-etiqueta parte">GRAVIDAD: <strong>{{ $items->gravidad }}</strong></span>
            <span class="para-etiqueta parte">PARA: <strong>{{ $items->para }}</strong></span>
            <span class="aborto-etiqueta parte">ABORTO: <strong>{{ $items->abortos }}</strong></span>

            <span class="material-enviado-etiqueta parte">MATERIAL ENVIADO: <strong>{{ $items->otros_b }}</strong></span>

            <span class="fecha-muestra-etiqueta parte">FECHA DE TOMA DE MUESTRA: <strong>{{ isset($items->fecha_muestra) ? $items->fecha_muestra->formatLocalized('%d/%m/%Y') : "" }}</strong></span>
            <span class="medico-etiqueta parte">MEDICO REMITENTE:  <strong>{{ $items->facturas->medico }}</strong></span>
            <hr class="parte linea">
            <span class="factura-etiqueta parte">{{ $items->serial }}</span>
            <span class="informe-sistema-etiqueta parte">INFORME SISTEMA BETHESDA</span>
            <span class="serial-etiqueta parte">No.: <strong>{{ $items->factura_id }}</strong></span>

            <span class="informe-etiqueta parte">{!! $items->informe !!}</span>

            @if($items->mm != 1)
            <span class="mm menor">La citología vaginal es un método de ayuda para seleccionar y detectar pacientes con lesiones premalignas y malignas del área genital.
            No debe ser usada como único método para diagnostico de cáncer genital. Resultados falso positivo y falso negativo pueden ocurrir.
            Si usted tiene alguna duda sobre su examen, se sugiere consultar con su médico.</span>
            @endif

            <span class="fecha-informe-etiqueta parte">Fecha del Informe <br>{{ isset($items->fecha_informe) ? $items->fecha_informe->formatLocalized('%d/%m/%Y') : "" }}</span>

            <div class="firma-1 parte">
                <div>{{ $items->firma->name }}</div>
                @if(isset($items->firma->extra))
                <div>{{ $items->firma->extra }}</div>
                @endif
                <div>{{ $items->firma->collegiate }}</div>
            </div>

            @if(isset($items->firma2_id))
            <div class="firma-2 parte">
                <div>{{ $items->firma2->name }}</div>
                @if(isset($items->firma2->extra))
                    <div>{{ $items->firma2->extra }}</div>
                @endif
                <div>{{ $items->firma2->collegiate }}</div>
            </div>
            @endif
        </div>
    </div>
    <script>
        function loadPrint() {
            window.print();
            setTimeout(function () { window.close(); }, 100);
        }
    </script>
@stop
