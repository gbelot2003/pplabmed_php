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
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h3>Estadística Morfología</h3>
                <small>Desde:{{ $bdate->formatLocalized('%d %B %Y') }} Hasta: {{ $edate->formatLocalized('%d %B %Y') }}</small>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped dataTable">
                <tr>
                    <th>Fecha Examen</th>
                    <th>Factura</th>
                    <th>Morfología 1</th>
                    <th>Morfología 2</th>
                    <th>Topográfico</th>
                    <th>Correlativo</th>
                </tr>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->fecha_informe }}</td>
                        <td>{{ $item->factura_id }}</td>
                        <td>{{ $item->mor1 }}</td>
                        <td>{{ $item->mor2 }}</td>
                        <td>{{ $item->topog }}</td>
                        <td>{{ $item->serial }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td>Recuento:</td>
                    <td colspan="5" class="text-left"><string>{{ $items->count() }}</string></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>