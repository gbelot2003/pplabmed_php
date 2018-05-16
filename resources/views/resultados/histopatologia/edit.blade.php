@extends('layouts.app-form')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/home">Inicio</a></li>
        <li><a href="{{ action('HistopatologiaController@index') }}">Listado de Histopatología</a></li>
        <li class="active">Edición de histopatología factura #{{ $item->factura_id }}</li>
    </ol>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted pull-right">
                            <a href="#" class="btn btn-default">Registros: {{ $today }}</a>
                            <a class="btn btn-default">Link Images ID: {{ $item->link_id }}</a>
                            @include('resultados.histopatologia.paginador')
                            <a onclick="window.open('{{ action('PrintController@sobreHistopatologia', $item->id) }}', '_blank', 'location=no,height=570,width=520,menubar=no,status=no,location=no,toolbar=no,scrollbars=yes,directories=no');"
                               class="btn btn-info" alt="Buscar"><span class="glyphicon glyphicon-envelope"></span></a>
                            <a onclick="window.open('{{ action('PrintController@formatoHistopatologia', $item->id) }}', '_blank', 'location=no,height=600,width=816,menubar=no,status=no,location=no,toolbar=no,scrollbars=yes,directories=no');"
                               class="btn btn-info" alt="Buscar"><span class="glyphicon glyphicon-print"></span></a>
                            <a href="{{ action('HistopatologiaController@create') }}" class="btn btn-info"
                               alt="Crear"><span class="glyphicon glyphicon-plus"></span></a>
                            <a href="{{ action('HistopatologiaController@searchPage') }}" class="btn btn-warning"
                               alt="Buscar"><span class="glyphicon glyphicon-search"></span></a>
                        </div>
                        <h4>Agregar de Histopatología</h4>
                    </div>
                    <div class="panel-body" id="app">
                        {!! Form::model($item, ['action' => ['HistopatologiaController@update', $item->id], 'id' => 'myForm', 'method' => 'PATCH']) !!}
                        @include('resultados.histopatologia._faturasPartial')
                        @include('resultados.histopatologia._histoPartial')
                        {!!  Form::close() !!}
                    </div>
                    <div class="panel-footer">
                        {{--<a onclick="window.open('{{ action('PrintController@formatoHistoatologiaEng', $item->id) }}', '_blank', 'location=no,height=600,width=816,menubar=no,status=no,location=no,toolbar=no,scrollbars=yes,directories=no');" class="btn btn-info" alt="Buscar" ><span class="glyphicon glyphicon-print"></span> ENG</a>--}}
                        <a class="btn btn-info" alt="Buscar"
                           href="{{ action('HistopatologiasEngController@editOrCreate', $item->serial) }}"><span
                                    class="glyphicon glyphicon-print"></span> EN</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="navTag">
        <div class="row">
            <div class="col-md-3">
                <label>Nombre</label><br>
                <span class="name">{{ $item->facturas->nombre_completo_cliente }}</span>
            </div>
            <div class="col-md-2">
                <label>Edad</label><br>
                <span class="name">{{ $item->facturas->edad }}</span>
            </div>
            <div class="col-md-3">
                <label>No. de Biopsia</label><br>
                <span class="name"><strong style="font-size: 16px">{{ $item->serial }}</strong></span>
            </div>
            <div class="col-md-3">
                <label>Usuario Editando</label><br>
                <span> <strong id="usuarioEditando"></strong></span>
            </div>

        </div>
    </div>
    @include('resultados.citologia._edit_factura_modal')
    @include('resultados.histopatologia._repeat_factura_modal')
@stop

@section('jscode')
    <style>
        #navTag {
            position: fixed;
            top: 24px;
            right: 0px;
            background: rgba(14, 155, 191, 0.73);
            width: 80%;
            height: 60px;
            padding: 5px;
            color: white;
            display: none;
        }
    </style>

    <script src="{{ asset('js/histopatologia-form.js') }}"></script>
    <script type="text/javascript">
        // EVENTO CUANDO SE MUEVE EL SCROLL, EL MISMO APLICA TAMBIEN CUANDO SE RESIZA
        var change = false;
        $(window).scroll(function () {
            window_y = $(window).scrollTop(); // VALOR QUE SE HA MOVIDO DEL SCROLL
            scroll_critical = 120; // VALOR DE TU DIV
            if (window_y > scroll_critical) { // SI EL SCROLL HA SUPERADO EL ALTO DE TU DIV
                // ACA MUESTRAS EL OTRO DIV Y EL OCULTAS EL DIV QUE QUIERES
                $('#navTag').show('slow'); // VER
            } else {
                // ACA HACES TODO LO CONTRARIO
                $('#navTag').hide('slow'); // OCULTAR
            }
        });
    </script>
    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('9d0b26afab9abbcbdcb9', {
            wsHost: 'ws.pusherapp.com',
            httpHost: 'sockjs.pusher.com',
            encrypted: true
        });

        var channel = pusher.subscribe('histopatologia.{{ $item->serial}}');

        channel.bind('updateHisto', function (data) {
            location.reload();
            toastr.success('Bipsia Editada exteriormente!!', 'Registro Guardado', {timeOut: 100000});
        });

    </script>
@stop

@section('modals')
    @include('resultados.histopatologia._modal_search')
    @include('resultados.histopatologia._modal_images')
    @include('resultados.histopatologia._modal_editor')
@stop