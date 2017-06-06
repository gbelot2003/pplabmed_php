@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb hidden-print">
        <li><a href="/home">Inicio</a></li>
        <li><a href="{{ route('reporte.muestras.index') }}">Formulario de reporte de identificador</a></li>
        <li class="active">Reporte de Identificador para Citología</li>
    </ol>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h3>Reporte de Identificador para Citología</h3>
                    <input type="button" class="btn btn-info btn-xs hidden-print" name="imprimir" value="Imprimir" onclick="window.print();"> <span class="hidden-print"> | </span>
                    <small>Desde:{{ $bdate->formatLocalized('%d %B %Y') }} Hasta: {{ $edate->formatLocalized('%d %B %Y') }}</small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <strong>Fecha de Informe:  {{  \Carbon\Carbon::now()->formatLocalized('%d %B %Y  %H:%m') }}</strong>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped dataTable">
                    <thead>
                    <th>Idetificador</th>
                    <th>Total</th>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td class="text-right" style="padding-right: 1rem">{{ $item->counter }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <table class="table-striped table table-bordered">
                    <tr>
                        <th>Total</th>
                        <th class="text-right" style="padding-right: 1rem">{{ $total }}</th>
                    </tr>
                </table>
            </div>
        </div>

    </div>@stop