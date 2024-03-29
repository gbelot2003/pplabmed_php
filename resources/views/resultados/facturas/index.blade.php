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
                                    <th>Examen</th>
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
    <script src="{{ asset('Citologias') }}"></script>
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
                       {data: 'nombre_examen', name: 'examenes.nombre_examen'},
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