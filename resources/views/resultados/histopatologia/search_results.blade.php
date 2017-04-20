@extends('layouts.app-form')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/home">Inicio</a></li>
        <li><a href="{{ action('HistopatologiaController@index') }}">Listado de Histopatología</a></li>
        <li class="active">Resultados de Busqueda</li>
    </ol>
@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @foreach($items as $item)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="text-muted pull-right">
                                {{ $items->links('vendor.pagination.form_paginator') }}
                                <a onclick="window.open('{{ action('PrintController@sobreHistopatologia', $item->id) }}', '_blank', 'location=no,height=570,width=520,menubar=no,status=no,location=no,toolbar=no,scrollbars=yes,directories=no');" class="btn btn-info" alt="Buscar" ><span class="glyphicon glyphicon-envelope"></span></a>
                                <a onclick="window.open('{{ action('PrintController@formatoHistopatologia', $item->id) }}', '_blank', 'location=no,height=600,width=816,menubar=no,status=no,location=no,toolbar=no,scrollbars=yes,directories=no');" class="btn btn-info" alt="Buscar" ><span class="glyphicon glyphicon-print"></span></a>
                                <a href="{{ action('HistopatologiaController@searchPage') }}" class="btn btn-warning" alt="Buscar" ><span class="glyphicon glyphicon-search"></span></a>
                            </div>
                            <h4>Agregar de Histopatología</h4>
                        </div>
                        <div class="panel-body" id="app">
                            {!! Form::model($item, ['action' => ['HistopatologiaController@update', $item->id], 'method' => 'PATCH']) !!}
                            @include('resultados.histopatologia._faturasPartial')
                            @include('resultados.histopatologia._histoPartial')
                            {!!  Form::close() !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop

@section('jscode')
    <script src="{{ asset('js/histopatologia-form.js') }}"></script>
@stop

@section('modals')
    @include('resultados.histopatologia._modal_images')
@stop