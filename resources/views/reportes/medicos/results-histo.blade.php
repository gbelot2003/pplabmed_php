@extends('layouts.pdf')
@section('pageTitle', 'Histopatología')

@section('content')

    <table>
        <tr>
            <td></td>
            <td><b>Total: {{ $histoTotal }}</b></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>
                Medico Informante: {{ $firma->name }}
            </td>
            <td></td>
            <td> </td>
            <td>Fecha Informe de :{{ $bdate }} a:{{ $edate }}</td>
        </tr>
        <tr>
            <td><b>No. Factura</b></td>
            <td><b>No. Item</b></td>
            <td><b>Nombre de Examen</b></td>
            <td><b>Nombre del Cliente</b></td>
        </tr>
        @foreach($items3 as $item)
            <tr>
                <td>{{ $item->Numero_Factura }}</td>
                <td>{{ $item->Numero_Item }}</td>
                <td>{{ $item->Tipo_Examen }}</td>
                <td>{{ $item->Nombre_Cliente }}</td>
                <td>{{ $item->fecha_informe->formatLocalized('%d %B %Y') }}</td>
            </tr>
        @endforeach

        @foreach($items4 as $item1)
            <tr>
                <td>{{ $item1->Numero_Factura }}</td>
                <td>{{ $item1->Numero_Item }}</td>
                <td>{{ $item1->Tipo_Examen }}</td>
                <td>{{ $item1->Nombre_Cliente }}</td>
                <td>{{ $item1->fecha_informe->formatLocalized('%d %B %Y') }}</td>
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Total: {{ $histoTotal }}</b></td>
        </tr>
    </table>

@stop