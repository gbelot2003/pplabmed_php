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
                                    <label>No. de Factura</label>
                                    {{ Form::number('factura_id', isset($item->facturas->name) ? $item->facturas->name : null,
                                    ['class' => 'form-control box-style yellow', 'id' => 'factura_id', 'tabindex' => 1,'require', 'placeholder' => 'Factura'] ) }}
                                </div>

                                <div class="col-md-3 form-group {{ $errors->has('serial') ? ' has-error' : '' }}">
                                    <label>No. de Serial</label>
                                    {{ Form::number('serial', isset($item->facturas->name) ? $item->facturas->name : null,
                                    ['class' => 'form-control box-style', 'id' => 'serial', 'tabindex' => 1,'require', 'placeholder' => 'Serial'] ) }}
                                </div>

                                <div class="col-md-4">
                                    <label>Nombre</label>
                                    {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
                                </div>

                                {{-- Firma 1 --}}
                                <div class="col-md-4 form-group  {{ $errors->has('firma_id') ? ' has-error' : '' }}">
                                    <label>Firma</label>
                                    {{ Form::select('firma_id', $firmas, null, ['class' => 'form-control', 'tabindex' => 2]) }}
                                </div>
                            </div>

                            <div class="row {{ $errors->has('informe') ? ' has-error' : '' }}">

                                <div class="col-md-12">
                                    <ul class="nav nav-tabs">
                                        @foreach($plantillas as $plantilla)
                                            <li role="presentation"><a class="bt-insert" href="{{ $plantilla->id }}">{{ $plantilla->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-md-12 form-group">
                                    {{ Form::textarea('body', null, ['class' => 'textarea form-control ckeditor', 'id' => 'informe', 'tabindex' => 3]) }}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-XSRF-TOKEN': $('input[name="_token"]').val()
                }
            });

            $('a.bt-insert').click(function(e){
                e.preventDefault();
                const id = $(this).attr("href");
                $.get('/plantillas/info/' + id)
                    .done(function(data){
                        console.log(data);
                        CKEDITOR.instances['informe'].insertHtml(data.body);
                    });
            });
        });

    </script>
    <script>
        (function(){
            $.ajaxSetup({
                headers: {
                    'X-XSRF-TOKEN': $('input[name="_token"]').val()
                }
            });

            $(document).ready(function () {
                $('#factura_id').focusout(function(){
                    var id = $(this).val();

                    $.get('/histo/serial/' + id)
                        .done(function (data) {
                            console.log(data.facturas.nombre_completo_cliente);
                            $('#serial').val(data.serial);
                            $('#nombre').val(data.facturas.nombre_completo_cliente);
                        })
                });
            });

        })(jQuery);
    </script>
@stop
