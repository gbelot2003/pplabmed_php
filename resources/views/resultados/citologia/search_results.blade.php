@extends('layouts.app-form')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="/home">Inicio</a></li>
    <li><a href="{{ action('CitologiaController@index') }}">Listado de Citologías</a></li>
    <li class="active">Resultados de Busqueda</li>
</ol>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach($items as $item)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted pull-right">
                            {{ $items->appends(\Request::all())->links('vendor.pagination.form_paginator') }}
                            <a onclick="window.open('{{ action('PrintController@sobresCitologia', $item->id) }}', '_blank', 'location=no,height=570,width=520,menubar=no,status=no,location=no,toolbar=no,scrollbars=yes,directories=no');" class="btn btn-info" alt="Buscar" ><span class="glyphicon glyphicon-envelope"></span></a>
                            <a onclick="window.open('{{ action('PrintController@formatoCitologia', $item->id) }}', '_blank', 'location=no,height=755.90,width=699.21,menubar=no,status=no,location=no,toolbar=no,scrollbars=yes,directories=no');" class="btn btn-info" alt="Buscar" ><span class="glyphicon glyphicon-print"></span></a>
                            <a href="{{ action('CitologiaController@create') }}" class="btn btn-info" alt="Crear" ><span class="glyphicon glyphicon-plus"></span></a>
                            <a href="{{ action('CitologiaController@searchPage') }}" class="btn btn-warning" alt="Buscar" ><span class="glyphicon glyphicon-search"></span></a>                        </div>
                        <h4>Agregar de Citología</h4>
                    </div>
                    <div class="panel-body" id="app">
                        {!! Form::model($item, ['action' => ['CitologiaController@update', $item->id], 'method' => 'PATCH']) !!}
                        @include('resultados.citologia._faturasPartial')
                        @include('resultados.citologia._citologiaPartial')
                        {!!  Form::close() !!}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@stop

@section('jscode')
    <script src="{{ asset('js/citologias-form.js') }}"></script>
@stop