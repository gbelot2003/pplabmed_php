@extends('layouts.pdf')
<style type="text/css">
    thead:before, thead:after { display: none; }
    tbody:before, tbody:after { display: none; }
    * {
        margin:0; padding:0;
    }
    body{
        font:11px Georgia, serif;
    }

    #page-wrap{
        width:600px;
        margin: 0 auto;
    }

    @page {
        margin: 120px 50px 80px 50px;
    }
    body { margin: 0px; }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="text-center">
                <h3>Hoja de Citologías</h3>
                <small>Desde:{{ $bdate->formatLocalized('%d %B %Y') }} Hasta: {{ $edate->formatLocalized('%d %B %Y') }}</small>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12">
            @foreach (array_chunk($items->all(), 9) as $eItems)
            <table class="table table-bordered table-striped dataTable">
                <tr>
                    <th>No. Factura</th>
                    <th>Sede</th>
                    <th>Paciente</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Examen</th>
                    <th>Informe</th>
                </tr>
                @foreach($eItems as $item)
                    <tr>
                        <td>{{ $item->factura_id }}</td>
                        <td>{{ $item->facturas->direccion_entrega_sede }}</td>
                        <td>{{ $item->facturas->nombre_completo_cliente }}</td>
                        <td>{{ $item->facturas->edad }}</td>
                        <td>{{ $item->facturas->sexo }}</td>
                        <td>{{ $item->facturas->examen['nombre_examen'] }}</td>
                        <td>{{ $item->serial }}</td>
                    </tr>
                @endforeach
            </table>
            @endforeach
        </div>

    </div>
</div>