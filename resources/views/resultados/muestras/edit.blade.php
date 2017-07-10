@extends('layouts.app-form')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/home">Inicio</a></li>
        <li><a href="{{ action('MuestrasController@index') }}">Listado de Constancias</a></li>
        <li class="active">Edición de Constancia de Muestra</li>
    </ol>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted pull-right">
                            <a onclick="window.open('{{ action('MuestrasPrintController@printMuestras', $items->id) }}', '_blank', 'location=no,height=570,width=520,menubar=no,status=no,location=no,toolbar=no,scrollbars=yes,directories=no');" class="btn btn-info" alt="Buscar" ><span class="glyphicon glyphicon-print"></span> ES</a>
                        </div>
                        <h4>Agregar de Constancia</h4>
                    </div>
                    <div class="panel-body" id="app">
                        {!! Form::model($items, ['action' => ['MuestrasController@update', $items->id], 'method' => 'PATCH']) !!}
                        <div class="panel-body">
                            @include('resultados.muestras._form')
                        </div>
                        <div class="panel-footer">

                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('jscode')
    <script src="/js/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.config.enterMode = 2;
    </script>
@stop
