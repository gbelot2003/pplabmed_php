@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {!! Form::open(['action' => ['UserPasswordController@changePassword']]) !!}
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Cambiar Password
                    </div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10 col-md-push-1 form-group box-style">
                            <label for="nombre">Nombre de Usuario</label>
                            {!! Form::text('username', $user->username, ['class' => 'form-control', 'disabled']) !!}
                            {!! Form::hidden('user_id', $user->id) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 col-md-push-1 form-group box-style">
                            <label for="nombre">Contraseña</label>
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>

                        <div class="col-md-5 col-md-push-1 form-group box-style">
                            <label for="nombre">Repita Contraseña</label>
                            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="panel-footer">
                    <div class="text-right">
                        <a href="/home" class="btn btn-danger">Cancelar</a>
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

