@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Factura No. <span style="color:darkred">{{ $factura->num_factura }}</span>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <ul class="list-group">
                                <li class="list-group-item">Nombre de Cliente: <strong>{{ $factura->nombre_completo_cliente }}</strong></li>
                                <li class="list-group-item">Numero de Identidad : <strong>{{ $factura->num_cedula }}</strong></li>
                                <li class="list-group-item">Fecha de Nacimiento : <strong>{{ $factura->nombre_completo_cliente }}</strong></li>
                                <li class="list-group-item">Correo: <strong>{{ $factura->correo }}</strong></li>
                            </ul>
                        </div>
                        <div class="col-md-7">
                            <ul class="list-group">
                                <li class="list-group-item">Entregar en Sede: <strong>{{ $factura->direccion_entrega_sede }}</strong></li>
                                <li class="list-group-item">Medico: <strong>{{ $factura->medico }}</strong></li>
                                <li class="list-group-item">Sexo: <strong>{{ $factura->sexo }}</strong></li>
                            </ul>
                        </div>
                    </div>

                    @if($factura->citologias->count())
                        <h3>Resultados Citología</h3>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <th>No. de Serie</th>
                                <th>No. Citología</th>
                                <th>Medico</th>
                                <th>Id Cito</th>
                                <th>Firma</th>
                                <th>Firma2</th>
                                <th>Fecha</th>
                            </thead>
                            <tbody>
                            @foreach($factura->citologias as $cito)
                                <tr>
                                    <td><a href="{{ action('CitologiaController@edit', $cito->id) }}">{{ $cito->id }}</a></td>
                                    <td>{{ $cito->serial }}</td>
                                    <td>{{ $cito->medico }}</td>
                                    <td>{{ $cito->idcito->name }}</td>
                                    <td>Dr(a). {{ $cito->firma->name }}</td>
                                    <td>
                                        @if($cito->firma2)
                                        Dr(a). {{ $cito->firma2->name }}
                                        @endif
                                    </td>
                                    <td>{{ $cito->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3>No hay Resultados en Citología</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop