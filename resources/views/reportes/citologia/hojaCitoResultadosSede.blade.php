@extends('layouts.app')

@section('breadcrumbs')

    <ol class="breadcrumb hidden-print">
        <li><a href="/home">Inicio</a></li>
        <li><a href="{{ action('ReportesController@hojaCitoDeptoForm') }}">Hoja de Reportes por Sedes</a></li>
        <li class="active">Hoja de Reportes por Sedes Resultados </li>
    </ol>
@stop


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <div class="text-center">
                        <h3>
                            @if($direccion != 'null')
                                {{ $direccion }}
                            @else
                                Hoja de Reportes por Sedes
                            @endif
                        </h3>
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
                    <th>Sede</th>
                    <th>Paciente</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Examen</th>
                    <th>Firma</th>
                    </thead>
                    <tbody>
                        @foreach($items as $items)
                            <tr>
                                <td>{{ $items['num_factura'] }}</td>
                                <td>{{ $items['direccion_entrega_sede'] }}</td>
                                <td>{{ $items['nombre_completo_cliente'] }}</td>
                                <td>{{ $items['edad'] }}</td>
                                <td>{{ $items['sexo'] }}</td>
                                <td>{{ $items['nombre_examen'] }}</td>
                                <td style="min-width: 12em"></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfooter>
                        <tr>
                            <td>Recuento:</td>
                            <td colspan="6" class="text-left"><string>{{ $total }}</string></td>
                        </tr>
                    </tfooter>
                </table>
            </div>
        </div>
    </div>
@stop