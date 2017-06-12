@extends('layouts.app')

@section('breadcrumbs')

    <ol class="breadcrumb hidden-print">
        <li><a href="/home">Inicio</a></li>
        <li><a href="{{ route('reporte.cito.index') }}">Hoja de Citología</a></li>
        <li class="active">Hoja de Citología Resultados </li>
    </ol>
@stop


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h3>Hoja de Citologías</h3>
                    <input type="button" class="btn btn-info btn-xs hidden-print" name="imprimir" value="Imprimir" onclick="window.print();"> <span class="hidden-print"> | </span>
                    <small>Desde:{{ $bdate->formatLocalized('%d %B %Y') }} Hasta: {{ $edate->formatLocalized('%d %B %Y') }}</small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped dataTable">
                    <thead>
                    <th>No. Factura</th>
                    <th>Paciente</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Medico</th>
                    <th>Examen</th>
                    <th>Informe</th>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->factura_id }}</td>
                            <td>
                                <div style="border-bottom: 1px solid dimgray">
                                    {{ $item->facturas->nombre_completo_cliente }}
                                </div>
                                {{ $item->facturas->direccion_entrega_sede }}
                            </td>
                            <td>{{ $item->facturas->edad }}</td>
                            <td>{{ $item->facturas->sexo }}</td>
                            <td>{{ $item->facturas->medico }}</td>
                            <td>{{ $item->facturas->examen['nombre_examen'] }}</td>
                            <td>{{ $item->serial }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfooter>
                        <tr>
                            <td>Recuento:</td>
                            <td colspan="6" class="text-left"><string>{{ $items->count() }}</string></td>
                        </tr>
                    </tfooter>
                </table>
            </div>
        </div>
    </div>
@stop