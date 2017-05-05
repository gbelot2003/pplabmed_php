@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {!! Form::model($item, ['action' => ['RolesController@update', $item->id], 'method' => 'put']) !!}
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Editar Rol
                    </div>
                </div>

                <div class="panel-body">
                    @include('seguridad.roles._form')
                </div>

                <div class="panel-footer">
                    <div class="text-right">
                        <a href="{{ action('RolesController@index') }}" class="btn btn-danger">Cancelar</a>
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