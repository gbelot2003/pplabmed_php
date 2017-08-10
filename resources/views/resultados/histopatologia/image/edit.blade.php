@extends('layouts.app-form')

@section('jscode')
    <script src="/js/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.config.enterMode = 2;
        CKEDITOR.config.height = 400;
        CKEDITOR.config.removePlugins = 'Smiley,font,format,Styles,forms,print,preview,find,about,maximize,showBlocks,undo,redo,find,replace,selectAll,removeFormat, flash, iFrame';
        CKEDITOR.config.removeButtons = 'emoticons,Iframe,Table,Anchor,Underline,Strike,Subscript,Superscript';
        CKEDITOR.config.extraPlugins = 'jsplus_image_editor';
        CKEDITOR.config.jsplus_image_editor_double_click = false;
    </script>
    <script>
        $('#preborrado').on('click', function (e) {
            e.preventDefault();
            $(this).hide();
            $('#borrado').show();
            $('#cborrado').show();
        })

        $("#cborrado").on('click',function (e) {
            e.preventDefault();
            $(this).hide();
            $('#preborrado').show();
            $('#borrado').hide();
        })
    </script>
@stop


@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/home">Inicio</a></li>
        <li><a href="{{ action('HistopatologiaController@index') }}">Listado de Histopatología</a></li>
        <li><a href="{{ action('HistopatologiaController@edit', $item->histo->id) }}">Histopatología
                No. {{ $item->histo->facturas->num_factura }}</a></li>
        <li class="active">Edicion de Imagenes # {{ $item->id }}</li>
    </ol>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <form method="post" action="{{ action('ImagesController@update', $item->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $item->link_id }}" id="link_id">
                        <input type="hidden" value="{{ $item->image_url }}" id="image_name">
                        <input type="hidden" value="{{ $item->id }}" id="id">
                        <div class="heading">
                            <div class="text-muted pull-right">
                                <a class="imageCanvas" href="/histopatologia/{{ $item->histo->serial }}/edit" class="btn btn-default">Regresar a
                                    Formulario</a>
                            </div>
                            <h4>Edición de Imagenes</h4>
                        </div>

                        <div class="body">

                            <div class="row">
                                <div class="col-md-12">
                                    <textarea id="ckeditor" class="ckeditor">
                                        <img name="img-responsive" src="/img/histo/{{ $item->image_url }}" alt="{{ $item->image_url }}" />
                                    </textarea>
                                    <div class="form-group">
                                        <br>
                                        {{--{{ Form::textarea('descripcion', isset($item->descripcion) ? $item->descripcion : null,
                                            ['id' => 'descripcion', 'class' => 'form-control', 'rows' => 2]) }}--}}
                                    </div>
                                </div>

                            </div>
                            <div class="footer">
                                <div class="text-right">
                                    <br>
                                    <button type="button" id="preborrado" class="btn btn-danger">Borrar</button>
                                    <button type="button" id="cborrado" style="display: none;" class="btn btn-warning">
                                        cancelar borrado
                                    </button>
                                    <a href="/histo/images/delete/{{ $item->id }}" id="borrado" style="display: none;" class="btn btn-danger">
                                        ¿La imagen se perdera totalmente de la aplicación, esta seguro que desea continuar?
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr />
                            <div class="row">
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </div>

                                <div class="col-md-4">
                                    <label for="order">Orden de Impresión</label>
                                    {{ Form::text('order', isset($item->order)? $item->order: 0, ['class' => 'form-control']) }}
                                </div>
                                <div class="col-md-6">
                                    <label for="order">Descripción</label>
                                    {{ Form::text('descripcion', isset($item->descripcion)? $item->descripcion: 0, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        #images2Cam{
            width: 100%;
            height: 350px;
        }

        .cr-image{
            position: relative !important;
        }
    </style>

@stop