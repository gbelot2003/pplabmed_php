@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {!! Form::open(['action' => ['GravidadController@store']]) !!}
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Agregar Gravidad
                    </div>
                </div>

                <div class="panel-body">
                    @include('parametrizacion.gravidad._form')
                </div>

                <div class="panel-footer">
                    <div class="text-right">
                        <a href="{{ action('GravidadController@index') }}" class="btn btn-danger">Cancelar</a>
                        <button type="submit" class="btn btn-primary">
                            Guardar <span class="glyphicon glyphicon-save"></span>
                        </button>
                    </div>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop