@extends('layouts.pdf')
<style type="text/css">
    thead:before, thead:after { display: none; }
    tbody:before, tbody:after { display: none; }
    * {
        margin:0; padding:0;
    }
    body{
        font:10px Helvetica, san-serif;
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
                <h3>
                    @if($direccion != 'null')
                        {{ $direccion }}
                    @else
                        Hoja de Reportes por Sedes
                    @endif
                </h3>
                <small>Desde:{{ $bdate->formatLocalized('%d %B %Y') }} Hasta: {{ $edate->formatLocalized('%d %B %Y') }}</small>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12">
            <table class="table table-bordered table-striped dataTable">
                <tr>
                    <th>No. Factura</th>
                    <th>Sede</th>
                    <th>Paciente</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Examen</th>
                    <th>Firma</th>
                </tr>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item['num_factura'] }}</td>
                        <td>{{ $item['direccion_entrega_sede'] }}</td>
                        <td>{{ $item['nombre_completo_cliente'] }}</td>
                        <td>{{ $item['edad'] }}</td>
                        <td>{{ $item['sexo'] }}</td>
                        <td>{{ $item['nombre_examen'] }}</td>
                        <td  style="min-width: 10em"></td>
                    </tr>
                @endforeach
                <tr>
                    <td>Recuento:</td>
                    <td colspan="6" class="text-left"><string>{{ $total }}</string></td>
                </tr>
            </table>
        </div>

    </div>
</div>