@extends('layouts.app')


@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/home">Inicio</a></li>
        <li class="active">Hoja de Reportes por Sedes</li>
    </ol>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                {!! Form::open() !!}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted pull-right">
                            {{--<a href="{{ action('CitologiaController@create') }}" class="btn btn-info" alt="Crear Citologia"><span class="glyphicon glyphicon-plus"></span></a>
                            <a class="btn btn-default" alt="Conig Seriales"><span class="glyphicon glyphicon-cog" data-toggle="modal" data-target="#myModal"></span></a>--}}
                        </div>
                        <h4>Hoja de Reportes por Sedes</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">

                            <div class="col-md-3 form-group  {{ $errors->has('inicio') ? ' has-error' : '' }}">
                                <label for="inicio">Fecha de Inicio</label>
                                {{ Form::date('inicio', Carbon\Carbon::today()->toDateString(), ['class' => 'form-control', 'id' => 'inicio', 'required']) }}
                            </div>

                            <div class="col-md-3 form-group  {{ $errors->has('final') ? ' has-error' : '' }}">
                                <label for="inicio">Fecha de Final</label>
                                {{ Form::date('final', Carbon\Carbon::today()->toDateString(), ['class' => 'form-control', 'id' => 'final', 'required']) }}
                            </div>

                            {{-- id Cito --}}
                            <div class="col-md-5 form-group  {{ $errors->has('final') ? ' has-error' : '' }}">
                                <label for="inicio">Dirección Sede</label>
                                {{ Form::select('direccion', $direc, null, ['class' => 'form-control', 'placeholder' => 'Ninguno']) }}
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3 form-group {{ $errors->has('deteccion_cancer') ? ' has-error' : '' }}">
                                <div class="checkbox checkbox-info">
                                    {!! Form::checkbox('pdf', 1, null, ['id' => 'checkbox1']) !!}
                                    <label for="checkbox1">Imprimir PDF (Para Consultas grandes)</label>
                                </div>
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