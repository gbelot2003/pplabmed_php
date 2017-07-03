@extends('layouts.pdf')
@section('pageTitle', 'Citología')

@section('content')

    <table>
        <tr>
            <td></td>
            <td><b>Total: {{ $fir1total }}</b></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>
                Medico Informante: {{ $firma->name }}
            </td>
            <td>Fecha Informe</td>
            <td>de : {{ $bdate }} </td>
            <td>a: {{ $edate }}</td>
        </tr>
        <tr>
            <td><b>No. Factura</b></td>
            <td><b>No. Item</b></td>
            <td><b>Nombre de Examen</b></td>
            <td><b>Nombre del Cliente</b></td>
        </tr>
        @foreach($items as $item)
            <tr>
                <td>{{ $item->Numero_Factura }}</td>
                <td>{{ $item->Numero_Item }}</td>
                <td>{{ $item->Tipo_Examen }}</td>
                <td>{{ $item->Nombre_Cliente }}</td>
                <td>{{ $item->fecha_informe->formatLocalized('%d %B %Y') }}</td>
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Total: {{ $fir1total }}</b></td>
        </tr>
    </table>

@stop