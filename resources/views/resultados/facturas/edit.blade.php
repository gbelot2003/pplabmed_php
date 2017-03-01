@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Factura No. <span style="color:darkred">{{ $factura->num_factura }}</span> de <span style="color:darkred">{{ $factura->nombre_completo_cliente }}</span>
                </div>
                <div class="panel-body">
                    @if($factura->citologias->count())
                        <h3>Resultados Citología</h3>
                        <table class="table table-bordered">
                            <thead>
                                <th>No. Citología</th>
                                <th>sereal</th>
                                <th>Firma</th>
                                <th>Fecha</th>
                            </thead>
                            @foreach($factura->citologias as $cito)
                                <tr>
                                    <td><a href="{{ action('CitologiaController@edit', $cito->id) }}">{{ $cito->id }}</a></td>
                                    <td></td>
                                    <td>Dr(a). {{ $cito->firma->name }}</td>
                                    <td>{{ $cito->created_at }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <h3>No hay Resultados en Citología</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop