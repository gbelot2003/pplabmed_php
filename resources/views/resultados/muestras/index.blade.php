@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/home">Inicio</a></li>
        <li class="active">Listado de Constancias de Entrega de Muestras</li>
    </ol>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <div class="text-muted pull-right">
                            <a href="{{ action('MuestrasController@create') }}" class="btn btn-info" alt="Crear Citologia"><span class="glyphicon glyphicon-plus"></span></a>
                        </div>
                        <h4>Constancias de Entrega de Muestras</h4>
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Serial</th>
                                <th>Firma</th>
                                <th>Fecha</th>
                                <th>Acción</th>
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
                    ajax: '{!! URL::to(action('MuestrasController@listados')) !!}',
                    columns:[
                        {data: 'id', name: 'serial'},
                        {data: 'serial', name: 'serial'},
                        {data: 'name', name: 'firmas.name'},
                        {data: 'finforme', name: 'muestras.created_at'},
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
