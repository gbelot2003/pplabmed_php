@extends('layouts.app-form')

@section('jscode')
    <script src="{{ asset('js/images-form.js') }}"></script>
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
                <div class="panel panel-default">
                    <form action="">
                        <div class="panel-heading">
                            <div class="text-muted pull-right">
                                <a class="imageCanvas" href="/histopatologia/{{ $item->histo->id }}/edit" class="btn btn-default">Regresar a
                                    Formulario</a>
                            </div>
                            <h4>Edición de Imagenes</h4>
                        </div>

                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Editor</h4>
                                </div>

                                <div class="col-md-9" style="background: grey; padding: 5px">
                                    <div class="image text-center">
                                        <img name="image" src="/img/histo/{{ $item->image_url }}"
                                             alt="{{ $item->image_url }}">
                                    </div>
                                    <div class="form-group">
                                        <br>
                                        <textarea name="descricion" class="form-control textarea" rows="2"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <button class="btn btn-default" type="submit" id="changeSave">Salvar</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
