@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <div class="text-muted pull-right">
                            <a href="{{ action('CitologiaController@create') }}" class="btn btn-info" alt="Crear Citologia"><span class="glyphicon glyphicon-plus"></span></a>
                            <a class="btn btn-default" alt="Conig Seriales"><span class="glyphicon glyphicon-cog" data-toggle="modal" data-target="#myModal"></span></a>
                        </div>
                        <h4>Registros de Citologia</h4>
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>No. Factura</th>
                                <th>Nombre del Paciente</th>
                                <th>Id Cito.</th>
                                <th>Fecha de Informe</th>
                                <th>Firma</th>
                                <th>Firma 2</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->serial }}</td>
                                    <td>{{ $item->factura_id }}</td>
                                    <td><a href="{{ action('CitologiaController@edit', $item->id) }}">{{ $item->facturas->nombre_completo_cliente }}</a></td>
                                    <td>{{ $item->idcito->name }}</td>
                                    <td>{{ $item->created_at->formatLocalized('%d %B %Y') }}</td>
                                    <td>{{ $item->firma->name }}</td>
                                    <td>
                                        @if($item->firma2)
                                            {{ $item->firma2->name }}
                                        @endif
                                    </td>
                                    {{--TODO: reeditar index despues de creaciòn de metodo serial y XML--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('modals')
    @include('resultados.citologia._modal_config')
@stop

