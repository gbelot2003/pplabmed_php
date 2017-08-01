@extends('layouts.app-form')

@section('jscode')
    <script src="/js/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.config.enterMode = 2;
        CKEDITOR.config.height = 800;
        CKEDITOR.config.removePlugins = 'Smiley,font,format,Styles,forms,print,preview,find,about,maximize,showBlocks,undo,redo,find,replace,selectAll,removeFormat, flash, iFrame';
        CKEDITOR.config.removeButtons = 'emoticons,Iframe,Table,Anchor,Underline,Strike,Subscript,Superscript';
        CKEDITOR.config.extraPlugins = 'jsplus_image_editor';
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
                    <form>
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $item->link_id }}" id="link_id">
                        <input type="hidden" value="{{ $item->image_url }}" id="image_name">
                        <input type="hidden" value="{{ $item->id }}" id="id">
                        <div class="heading">
                            <div class="text-muted pull-right">
                                <a class="imageCanvas" href="/histopatologia/{{ $item->histo->id }}/edit" class="btn btn-default">Regresar a
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
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        #images2Cam{
            width: 100%;
            height: 600px;
        }

        .cr-image{
            position: relative !important;
        }
    </style>

@stop