@extends('layouts.app-form')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @foreach($items as $item)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="text-muted pull-right">
                                {{ $items->links('vendor.pagination.form_paginator') }}
                                <a class="btn btn-warning" alt="Buscar" ><span class="glyphicon glyphicon-search" data-toggle="modal" data-target="#searchModal"></span></a>
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
    @include('resultados.histopatologia._modal_search')
@stop