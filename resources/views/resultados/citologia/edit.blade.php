@extends('layouts.app-form')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted pull-right">
                            @if(Entrust::can('create-firmas'))
                                <a class="btn btn-warning" alt="Crear Citologia"><span class="glyphicon glyphicon-search"></span></a>
                            @endif
                        </div>
                        <h4>Agregar de Citología</h4>
                    </div>
                    <div class="panel-body" id="app">
                        {!! Form::model($item, ['action' => ['CitologiaController@update', $item->id], 'method' => 'PATCH']) !!}
                            @include('resultados.citologia._faturasPartial')
                            @include('resultados.citologia._citologiaPartial')
                        {!!  Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('jscode')
    <script src="{{ asset('js/citologias-form.js') }}"></script>
@stop