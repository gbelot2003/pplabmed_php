@extends('layouts.app-form')

@section('jscode')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.1/croppie.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.1/croppie.css">
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
                                <div class="col-md-4">
                                    <br>
                                    <label style="font-size: 16px">Brillo</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input id="brightness" type="range" min="-100" max="100" value="0" step="1" />
                                        </div>
                                        <div class="col-md-4">
                                            <span id="brightnessValue">0</span>
                                        </div>
                                    </div>

                                    <br>
                                    <label style="font-size: 16px">Contraste</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input id="contrast" type="range" min="-100" max="100" value="0" step="1" />
                                        </div>
                                        <div class="col-md-4">
                                            <span id="contrastValue">0</span>
                                        </div>
                                    </div>

                                    <br>
                                    <label style="font-size: 16px">Saturación</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input id="saturation" type="range" min="0" max="10" step="0.1" value="0" data-filter="gamma">
                                        </div>
                                        <div class="col-md-4">
                                            <span id="saturationValue">0</span>
                                        </div>
                                    </div>
                                    <br>
                                    <label style="font-size: 16px">Exposición</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input id="exposure" type="range" min="-100" max="100" value="0" step="1" />
                                        </div>
                                        <div class="col-md-4">
                                            <span id="exposureValue">0</span>
                                        </div>
                                    </div>
                                    <br>
                                    <label style="font-size: 16px">Opciones</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <br>
                                            <button type="button" class="btn btn-primary" id="cortar">Cortar</button>
                                            <button type="button" class="btn btn-warning" id="filtros">Editar Filtros</button>
                                            <button type="button" class="btn btn-info" style="display: none" id="gfiltros">Guardar</button>
                                            <button type="button" class="btn btn-info" style="display: none" id="gcortar">Guardar</button>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-8">
                                    <div id="demo-basic">
                                        <img name="img-responsive" src="/img/histo/{{ $item->image_url }}"
                                             alt="{{ $item->image_url }}" id="images2Cam" />

                                    </div>
                                    <div class="form-group">
                                        <br>
                                        {{ Form::textarea('descripcion', isset($item->descripcion) ? $item->descripcion : null,
                                            ['id' => 'descripcion', 'class' => 'form-control', 'rows' => 2]) }}
                                    </div>
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
