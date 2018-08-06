@extends('layouts.pdf')
@section('pageTitle', 'Auditorias')

@section('content')
    <table>
        <tr>
            <td>
              Registro de Logs
            </td>
            <td>Fecha Informe</td>
            <td>de : {{ $bdate }} </td>
            <td>a: {{ $edate }}</td>
        </tr>
        <tr>
            <td><b>Titulo</b></td>
            <td><b>Acción</b></td>
            <td><b>Detalles</b></td>
            <td><b>Usuaro</b></td>
            <td><b>Fecha de Informe</b></td>
        </tr>
        @foreach($results as $log)
            <tr>
                <td>{{ $log->title }}</td>
                <td>{{ $log->action }}</td>
                <td>{{ $log->details }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $log->created_at->format('d-m-Y') }}</td>
            </tr>
        @endforeach
    </table>

@stop