@extends('layouts.app')

@section('breadcrumbs')

    <ol class="breadcrumb hidden-print">
        <li><a href="/home">Inicio</a></li>
        <li><a href="{{ action('ReportesController@morfologiaForm') }}">Estadística Morfología</a></li>
        <li class="active">Estadística Morfología Resultados </li>
    </ol>
@stop


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h3>Estadística Morfología</h3>
                    <input type="button" class="btn btn-info btn-xs hidden-print" name="imprimir" value="Imprimir" onclick="window.print();"> <span class="hidden-print"> | </span>
                    <small>Desde:{{ $bdate->formatLocalized('%d %B %Y') }} Hasta: {{ $edate->formatLocalized('%d %B %Y') }}</small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped dataTable">
                    <thead>
                    <th>Fecha Examen</th>
                    <th>Factura</th>
                    <th>Morfología 1</th>
                    <th>Morfología 2</th>
                    <th>Topográfico</th>
                    <th>Correlativo</th>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->fecha_informe }}</td>
                            <td>{{ $item->factura_id }}</td>
                            <td>{{ $item->mor1 }}</td>
                            <td>{{ $item->mor2 }}</td>
                            <td>{{ $item->topog }}</td>
                            <td>{{ $item->serial }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfooter>
                        <tr>
                            <td>Recuento:</td>
                            <td colspan="5" class="text-left"><string>{{ $items->count() }}</string></td>
                        </tr>
                    </tfooter>
                </table>
            </div>
        </div>
    </div>
@stop