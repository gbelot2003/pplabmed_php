@extends('layouts.app-form')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/home">Inicio</a></li>
        <li><a href="{{ action('HistopatologiaController@index') }}">Listado de Histopatología</a></li>
        <li class="active">Formulario de busqueda</li>
    </ol>
@stop


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted pull-right">

                        </div>
                        <h4>Busqueda de Histopatología</h4>
                    </div>
                    <div class="panel-body" id="app">
                        {!! Form::open(['action' => ['HistopatologiaController@processForm'], 'method' => 'GET']) !!}
                            @include('resultados.histopatologia._search_form')
                        {!!  Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('jscode')
    <script src="{{ asset('js/histopatologia-form.js') }}"></script>
@stop