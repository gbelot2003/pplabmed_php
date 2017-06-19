@extends('layouts.app')


@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/home">Inicio</a></li>
        <li class="active">Estadística Morfología</li>
    </ol>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open() !!}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted pull-right"></div>
                        <h4>Estadística Morfología</h4>
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

                            <div class="col-md-2 form-group  {{ $errors->has('final') ? ' has-error' : '' }}">
                                <label for="inicio">Morfología I</label>
                                {!!  Form::text('mor1', null, ['class' => 'form-control', 'id' => 'mor1'])  !!}

                            </div>

                            <div class="col-md-2 form-group  {{ $errors->has('final') ? ' has-error' : '' }}">
                                <label for="inicio">Morfología II</label>
                                {!!  Form::text('mor2', null, ['class' => 'form-control', 'id' => 'mor2'])  !!}
                            </div>

                            <div class="col-md-2 form-group  {{ $errors->has('final') ? ' has-error' : '' }}">
                                <label for="inicio">Topografía</label>
                                {!!  Form::text('topog', null, ['class' => 'form-control', 'id' => 'topog'])  !!}
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