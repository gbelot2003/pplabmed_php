@extends('layouts.app')

@section('breadcrumbs')

    <ol class="breadcrumb hidden-print">
        <li><a href="/home">Inicio</a></li>
        <li><a href="{{ route('medico.informante.index') }}">Formulario de medico informante</a></li>
        <li class="active">Reporte de Medico Informante</li>
    </ol>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h3>Reporte de Medico Informante</h3>
                    <input type="button" class="btn btn-info btn-xs hidden-print" name="imprimir" value="Imprimir"
                           onclick="window.print();"> <span class="hidden-print"> | </span>
                    <small>Desde:{{ $bdate->formatLocalized('%d %B %Y') }}
                        Hasta: {{ $edate->formatLocalized('%d %B %Y') }}</small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <strong>Fecha de Informe: {{  \Carbon\Carbon::now()->formatLocalized('%d %B %Y  %H:%m') }}</strong>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table dataTable">
                    <thead>
                    <th>Medico</th>
                    <th>Citologias</th>
                    <th>Citologias, Segunda Firma</th>
                    <th>Biopsias</th>
                    <th>Biopsias, Segunda Firma</th>
                    <th>Total</th>
                    </thead>
                    <tbody>
                        <td>{{ $firma->name }}</td>
                        <td>{{ $f1 }}</td>
                        <td>{{ $f2 }}</td>
                        <td>{{ $f3 }}</td>
                        <td>{{ $f4 }}</td>
                        <td>{{ $total }}</td>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@stop