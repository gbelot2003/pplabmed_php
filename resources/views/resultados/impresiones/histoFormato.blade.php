@extends('layouts.formularios2')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5 class="text-center uppercase">Reporte de Histopatología</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <span class="no-print"><a class="imprimir" onclick="window.print();" href="#">Imprimir</a></span>
                <table class="table">
                    <tr>
                        <td>
                            <div>
                                <span class="uppercase">Paciente:</span> <span
                                        class="strong uppercase">{{ $items->facturas->nombre_completo_cliente }}</span>
                            </div>
                            <div>
                                <span class="uppercase">Medico:</span><span
                                        class="strong uppercase">{{ $items->facturas->medico }}</span>
                            </div>
                        </td>
                        <td><span class="uppercase">Edad:</span><span
                                    class="strong uppercase">{{ $items->facturas->edad }}</span></td>
                        <td><span class="uppercase">Sexo:</span><span
                                    class="strong uppercase">{{ $items->facturas->sexo }}</span></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div>
                                <span class="uppercase">Dirección</span><span class="strong uppercase">
                                    {{ $items->facturas->direccion_entrega_sede }}
                                </span>
                            </div>
                            <div>
                                <span class="uppercase">Diagnostico Clinico: </span><span
                                        class="strong uppercase">{{  $items->diagnostico }}</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div>
                                <span class="uppercase">Material Estudiado: </span><span
                                        class="strong uppercase">{{  $items->muestra }}</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <span class="uppercase">Fecha de Informe: </span>
                                <span class="strong">
                                    @if($items->fecha_informe)
                                        {{ $items->fecha_informe->formatLocalized('%d/%m/%Y') }}
                                    @endif
                                </span>
                            </div>
                            <div>
                                <span class="uppercase">Fecha de Biopsia: </span>
                                <span class="strong">
                                    @if($items->fecha_biopcia)
                                        {{ $items->fecha_biopcia->formatLocalized('%d/%m/%Y') }}
                                    @endif
                            </span>
                            </div>
                        </td>

                        <td>
                            <div>
                                <span class="uppercase">Muestra Recibida: </span><span class="strong">
                                @if($items->fecha_muestra)
                                        {{ $items->fecha_muestra->formatLocalized('%d/%m/%Y') }}
                                    @endif
                            </span>
                            </div>
                            <div>

                            </div>
                        </td>
                        <td>
                            <div>
                                <span class="uppercase">No. de Biopsia: </span><span
                                        class="strong">{{ $items->serial }}
                                    - {{ $items->created_at->format('Y') }}</span>
                            </div>
                            <span class="uppercase">No. de Factura: </span><span
                                    class="strong"> {{ $items->facturas->num_factura }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <h5 style="text-align:center">INFORME</h5>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="body-content" style="font-size: 12px">
                                {!! $items->informe !!}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            @foreach($items->images as $image)
                                <img style="width: 5cm; height:3cm;" id="{{ $image->id }}"
                                     class="img-responsive img-thumbnail image" src="/img/histo/{{ $image->image_url }}"
                                     alt="{{ $image->image_url }}"/>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div id="footer">
                                <div class="firma-1">
                                    <div>{{ $items->firma->name }}</div>
                                    @if(isset($items->firma->extra))
                                        <div>{{ $items->firma->extra }}</div>
                                    @endif
                                    <div>{{ $items->firma->collegiate }}</div>
                                </div>

                                @if(isset($items->firma2_id))
                                    <div class="firma-2">
                                        <div>{{ $items->firma2->name }}</div>
                                        @if(isset($items->firma2->extra))
                                            <div>{{ $items->firma2->extra }}</div>
                                        @endif
                                        <div>{{ $items->firma2->collegiate }}</div>
                                    </div>
                                @endif
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/histo_form.css">
@stop
