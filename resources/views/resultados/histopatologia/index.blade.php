@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/home">Inicio</a></li>
        <li class="active">Listado de Histopatologías</li>
    </ol>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <div class="text-muted pull-right">
                            <a href="{{ action('HistopatologiaController@create') }}" class="btn btn-info" alt="Crear Citologia"><span class="glyphicon glyphicon-plus"></span></a>
                            <a class="btn btn-default" alt="Conig Seriales"><span class="glyphicon glyphicon-cog" data-toggle="modal" data-target="#myModal"></span></a>
                        </div>
                        <h4>Registros de Histopatologia</h4>
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>No. Factura</th>
                                <th>Nombre del Paciente</th>
                                <th>Firma</th>
                                <th>Fecha de Informe</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('jscode')
    <script>
        (function(){
            $(document).ready(function(){
                $('.dataTable').dataTable({
                    processing: true,
                    serverSide: true,
                    "order": [[ 0, "desc" ]],
                    ajax: '{!! URL::to(action('HistopatologiaController@listados')) !!}',
                    columns:[
                        {data: 'serial', name: 'histopatologias.serial'},
                        {data: 'factura_id', name: 'histopatologias.factura_id'},
                        {data: 'nombre_completo_cliente', name: 'facturas.nombre_completo_cliente'},
                        {data: 'name', name: 'firmas.name'},
                        {data: 'created_at', name: 'histopatologias.created_at'},
                        {data: 'href', name: 'href',  "searchable": false},

                    ],
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ registros por página",
                        "zeroRecords": "Registro no encotrado - lo sentimos",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros de esa busqueda",
                        "infoFiltered": "(filtrado de _MAX_ total Total de regístros)",
                        "search":  "Busqueda:",
                        "paginate": {
                            "first":      "Primero",
                            "last":       "Ultimo",
                            "next":       "Siguiente",
                            "previous":   "Anterior"
                        }
                    }
                });
            });
        })();
    </script>
@stop

@section('modals')
    @include('resultados.histopatologia._modal_config')
@stop
