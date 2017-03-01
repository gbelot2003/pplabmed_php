@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted pull-right">
                            {{--<a href="" class="btn btn-info" alt="Facturas"><span class="glyphicon glyphicon-plus"></span></a>--}}
                        </div>
                        <h4>Registros de Facturas</h4>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered dataTable">
                                <thead>
                                    <th>No. Factura</th>
                                    <th>Nombre Completo</th>
                                    <th>E-mail</th>
                                    <th>Medico</th>
                                    <th>Fecha</th>
                                </thead>
                                <tbody>
                                @foreach($facturas as $item)
                                    <tr>
                                        <td>{{ $item->num_factura }}</td>
                                        <td><a href="{{ action('FacturasController@edit', $item->id) }}">{{ $item->nombre_completo_cliente }}</a></td>
                                        <td>{{ $item->correo }}</td>
                                        <td>{{ $item->medico }}</td>
                                        <td>{{ $item->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
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
               $('.dataTable').dataTable();
            });
        })();
    </script>
@stop