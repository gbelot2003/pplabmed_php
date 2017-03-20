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
            <div class="col-md-10 col-md-offset-1">
                <div class="text-center">
                    <h3>Hoja de Citologías</h3>
                    <small>Desde:{{ $bdate->formatLocalized('%d %B %Y') }} Hasta: {{ $edate->formatLocalized('%d %B %Y') }}</small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table" style="font:11px Georgia, serif">
                    <tr>
                        <th>Fac#</th>
                        <th>Paciente</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Medico</th>
                        <th>Dirección</th>
                        <th>Informe(serial)</th>
                    </tr>
                    @foreach($items as $item)
                        <tr>
                            <td style="border-bottom:1px solid black;">{{ $item->factura_id }}</td>
                            <td style="border-bottom:1px solid black;">{{ $item->facturas->nombre_completo_cliente }}</td>
                            <td style="border-bottom:1px solid black;">{{ $item->facturas->edad }}</td>
                            <td style="border-bottom:1px solid black;">{{ $item->facturas->sexo }}</td>
                            <td style="border-bottom:1px solid black;">{{ $item->facturas->medico }}</td>
                            <td style="border-bottom:1px solid black;">{{ $item->facturas->direccion_entrega_sede }}</td>
                            <td style="border-bottom:1px solid black;">{{ $item->serial }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>