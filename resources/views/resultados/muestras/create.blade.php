@extends('layouts.app-form')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/home">Inicio</a></li>
        <li><a href="{{ action('MuestrasController@index') }}">Listado de Constancias</a></li>
        <li class="active">Creación de Constancia de Muestra</li>
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
                        <h4>Agregar de Constancia</h4>
                    </div>
                    <div class="panel-body" id="app">
                        {!! Form::open(['action' => 'MuestrasController@store', 'id' => 'myForm']) !!}
                        <div class="panel-body">
                            <div class="row">
                                {{--Serial--}}
                                <div class="col-md-3 form-group {{ $errors->has('serial') ? ' has-error' : '' }}">
                                    <label>No. de Biopsia</label>
                                    {{ Form::number('serial', isset($item->facturas->name) ? $item->facturas->name : null,
                                    ['class' => 'form-control box-style yellow', 'id' => 'serial', 'tabindex' => 1,'require', 'placeholder' => 'Serial'] ) }}
                                </div>

                                {{-- Firma 1 --}}
                                <div class="col-md-6 form-group  {{ $errors->has('firma_id') ? ' has-error' : '' }}">
                                    <label>Firma</label>
                                    {{ Form::select('firma_id', $firmas, null, ['class' => 'form-control', 'tabindex' => 2]) }}
                                </div>
                            </div>

                            <div class="row {{ $errors->has('informe') ? ' has-error' : '' }}">
                                <div class="col-md-12 form-group">
                                    <label>Informe</label>
                                    {{ Form::textarea('body', $body, ['class' => 'textarea form-control ckeditor', 'id' => 'informe', 'tabindex' => 3]) }}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="text-right">
                                    <br>
                                    <a class="btn btn-info" href="{{ action('MuestrasController@index') }}">Cancelar/Listado</a>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
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
        $(document).ready(function () {
            CKEDITOR.instances['informe'].insertHtml("Este es texto que va dentro del campo");
        });
    </script>
@stop
