@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {!! Form::open(['action' => ['AreaController@store']]) !!}
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Agregar Área
                    </div>
                </div>

                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-10 col-md-push-1 form-group box-style">
                            <label for="nombre">Nombre de Área</label>
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1 col-md-push-1 form-group box-style">
                            <label for="state">Estado</label>
                            <div id="dimension-switch" class="make-switch">
                                {!! Form::checkbox('state', 'checked') !!}
                            </div>
                        </div>
                    </div>


                </div>

                <div class="panel-footer">
                     <div class="text-right">
                         <a href="{{ action('AreaController@index') }}" class="btn btn-danger">Cancelar</a>
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