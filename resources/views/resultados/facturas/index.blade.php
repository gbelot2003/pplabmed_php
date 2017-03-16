@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/home">Inicio</a></li>
        <li class="active">Listado de Facturas</li>
    </ol>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted pull-right">
                            <a href="{{ action('FilesController@readFiles') }}" class="btn btn-info" alt="Facturas"><span class="glyphicon glyphicon-refresh"></span></a>
                        </div>
                        <h4>Registros de Facturas</h4>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered dataTable">
                                <thead>
                                    <th>No. Factura</th>
                                    <th>Nombre de Cliente</th>
                                    <th>E-Mail</th>
                                    <th>Medico</th>
                                    <th>Fecha</th>
                                    <th>Acción</th>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('jscode')
    <script src="{{ asset('js/citologias-form.js') }}"></script>
    <script>
        (function(){
            $(document).ready(function(){
               $('.dataTable').dataTable({
                   processing: true,
                   serverSide: true,
                   "order": [[ 0, "desc" ]],
                   ajax: '{!! URL::to(action('FacturasController@listados')) !!}',
                   columns:[
                       {data: 'num_factura', name: 'num_factura'},
                       {data: 'nombre_completo_cliente', name: 'nombre_completo_cliente'},
                       {data: 'correo', name: 'correo'},
                       {data: 'medico', name: 'medico'},
                       {data: 'created_at', name: 'created_at'},
                       {data: 'href', name:'href'},
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