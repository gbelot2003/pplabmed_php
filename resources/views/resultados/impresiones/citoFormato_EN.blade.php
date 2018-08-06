@extends('layouts.formularios')
@section('content')
    <link rel="stylesheet" href="/css/cito_form.css">
    <div id="formulario">
        <span class="no-print"><a class="imprimir" onclick="loadPrint()" href="#">Imprimir</a></span>
        <div id="cabezera">
            <span class="paciente-etiqueta parte">PATIENT: <strong>{{ $items->facturas->nombre_completo_cliente }}</strong></span>
            <span class="edad-etiqueta parte">AGE: <strong>{{ $items->facturas->edad }}</strong></span>
            <span class="sexo-etiqueta parte">SEX: <strong>{{ $items->facturas->sexo }}</strong></span>
            <span class="direccion-etiqueta parte">ADDRESS:</span>
            <span class="direccion parte"><strong>{{ $items->facturas->direccion_entrega_sede }}</strong></span>
            <span class="telefono-etiqueta parte">DOCTOR: <strong>{{ $items->facturas->medico }}</strong></span>
            <span CLASS="solicitud-etiqueta parte"><strong>CITOLOGICAL STUDY APPLICATION</strong></span>

            <span class="deteccion-etiqueta parte">CANCER DETECTION:
                @if($items->deteccion_cancer == true)
                    <strong>X</strong>
                @endif
            </span>

            <span class="indice-maduracion-etiqueta parte">MATURATION INDEX:
                @if($items->indice_maduracion == true)
                    <strong>X</strong>
                @endif
            </span>
            <span class="otros-etiqueta parte">OTHERS: <strong>{{ $items->otros_a }}</strong></span>

            <span class="diagnostico-clinico-etiqueta parte"><strong>CLINICAL DIAGNOSTIC:</strong> {{ $diagnostico }}</span>

            <span class="fur-etiqueta parte">F.U.R.: <strong>{{ isset($items->fur) ? $items->fur->formatLocalized('%m/%d/%Y') : "" }}</strong></span>
            <span class="fup-etiqueta parte">F.U.P.: <strong>{{ isset($items->fup) ?  $items->fup->formatLocalized('%m/%d/%Y') : ""}}</strong></span>
            <span class="gravidad-etiqueta parte">GRAVIDAD: <strong>{{ $items->gravidad }}</strong></span>
            <span class="para-etiqueta parte">TO: <strong>{{ $items->para }}</strong></span>
            <span class="aborto-etiqueta parte">ABORTION: <strong>{{ $items->abortos }}</strong></span>

            <span class="material-enviado-etiqueta parte">MATERIAL SENT: <strong>{{ $material }}</strong></span>

            <span class="fecha-muestra-etiqueta parte">DATE OF SAMPLING: <strong>{{ isset($items->fecha_muestra) ? $items->fecha_muestra->formatLocalized('%m/%d/%Y') : "" }}</strong></span>
            <span class="medico-etiqueta parte">MEDICAL SENDER:  <strong>{{ $items->facturas->medico }}</strong></span>
            <hr class="parte linea">
            <span class="factura-etiqueta parte">{{ $items->serial }}</span>
            <span class="informe-sistema-etiqueta parte">BETHESDA SYSTEM REPORT</span>
            <span class="serial-etiqueta parte">No.: <strong>{{ $items->factura_id }}</strong></span>

            <span class="informe-etiqueta parte">{!! $informe !!}</span>

            @if($items->mm != 1)
            <span class="mm menor">Vaginal cytology is a helpful method to select and detect patients with premalignant and malignant lesions of the genital area. It should not be used as the sole method for diagnosing genital cancer. False positive and false negative results can occur. If you have any questions about your exam, it is suggested to consult your doctor.</span>
            @endif

            <span class="fecha-informe-etiqueta parte">Report date<br>{{ isset($items->fecha_informe) ? $items->fecha_informe->formatLocalized('%m/%d/%Y') : "" }}</span>

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
