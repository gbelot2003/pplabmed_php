@extends('layouts.app')


@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/home">Inicio</a></li>
        <li class="active">Informe de Biopsias</li>
    </ol>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open() !!}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted pull-right">
                            {{--<a href="{{ action('CitologiaController@create') }}" class="btn btn-info" alt="Crear Citologia"><span class="glyphicon glyphicon-plus"></span></a>
                            <a class="btn btn-default" alt="Conig Seriales"><span class="glyphicon glyphicon-cog" data-toggle="modal" data-target="#myModal"></span></a>--}}
                        </div>
                        <h4>Informe de Biopsia</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">

                            <div class="col-md-3 form-group  {{ $errors->has('inicio') ? ' has-error' : '' }}">
                                <label for="inicio">Fecha de Inicio</label>
                                {{ Form::text('inicio', Carbon\Carbon::today()->format('d/m/Y'),
                                ['class' => 'form-control dateclass', 'id' => 'inicio', 'required']) }}
                            </div>

                            <div class="col-md-3 form-group  {{ $errors->has('final') ? ' has-error' : '' }}">
                                <label for="inicio">Fecha de Final</label>
                                {{ Form::text('final', Carbon\Carbon::today()->format('d/m/Y'),
                                ['class' => 'form-control dateclass', 'id' => 'final', 'required']) }}
                            </div>

                            <div class="col-md-4 form-group  {{ $errors->has('final') ? ' has-error' : '' }}">
                                <label for="inicio">Dirección Sede</label>
                                {{ Form::select('direccion', $direc, null, ['class' => 'form-control', 'placeholder' => 'Ninguno']) }}
                            </div>
                        </div>

                    </div>
                    <div class="panel-footer">
                        {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('jscode')
    <script src="{{ asset('js/citologias-form.js') }}"></script>
@stop