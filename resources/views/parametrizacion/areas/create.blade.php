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

                </div>
                <div class="panel-footer">

                </div>
            </div>
        </div>
    </div>
@stop