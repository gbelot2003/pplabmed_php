@extends('layouts.app-form')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/home">Inicio</a></li>
        <li><a href="{{ action('CitologiaController@index') }}">Listado de Citologías</a></li>
        <li class="active">Edicion de Citología factura #{{ $item->factura_id }}</li>
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
                            @include('resultados.citologia.paginador')
                            <a onclick="window.open('{{ action('PrintController@sobresCitologia', $item->id) }}', '_blank', 'location=no,height=570,width=520,menubar=no,status=no,location=no,toolbar=no,scrollbars=yes,directories=no');" class="btn btn-info" alt="Buscar" ><span class="glyphicon glyphicon-envelope"></span></a>
                            <a onclick="window.open('{{ action('PrintController@formatoCitologia', $item->id) }}', '_blank', 'location=no,height=755.90,width=699.21,menubar=no,status=no,location=no,toolbar=no,scrollbars=yes,directories=no');" class="btn btn-info" alt="Buscar" ><span class="glyphicon glyphicon-print"></span> ES</a>
                            <a href="{{ action('CitologiaController@create') }}" class="btn btn-info" alt="Crear" ><span class="glyphicon glyphicon-plus"></span></a>
                            <a href="{{ action('CitologiaController@searchPage') }}" class="btn btn-warning" alt="Buscar" ><span class="glyphicon glyphicon-search"></span></a>
                        </div>
                        <h4>Agregar de Citología</h4>
                    </div>
                    <div class="panel-body" id="app">
                        {!! Form::model($item, ['action' => ['CitologiaController@update', $item->id], 'id' => 'myForm', 'method' => 'PATCH']) !!}
                            @include('resultados.citologia._faturasPartial')
                            @include('resultados.citologia._citologiaPartial')
                        {!!  Form::close() !!}
                    </div>
                    <div class="panel-footer">
                        <a onclick="window.open('{{ action('PrintController@formatoCitologiasEng', $item->id) }}', '_blank', 'location=no,height=755.90,width=699.21,menubar=no,status=no,location=no,toolbar=no,scrollbars=yes,directories=no');" class="btn btn-info" alt="Buscar" ><span class="glyphicon glyphicon-print"></span> EN</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="navTag">
        <div class="row">
            <div class="col-md-1">
                <label>No de Factura</label><br>
                <span class="name">{{ $item->facturas->num_factura }}</span>
            </div>
            <div class="col-md-3">
                <label>Nombre</label><br>
                    <span class="name">{{ $item->facturas->nombre_completo_cliente }}</span>
            </div>
            <div class="col-md-3">
                <label>Nombre</label><br>
                <span class="name">{{ $item->facturas->direccion_entrega_sede }}</span>
            </div>
        </div>
    </div>
@stop

@section('jscode')
    <style>
        #navTag {
            position: fixed;
            top: 24px;
            right: 0px;
            background: rgba(14, 155, 191, 0.73);
            width: 80%;
            height: 52px;
            padding: 5px;
            color: white;
            display:none;
        }
    </style>
    <script src="{{ asset('js/citologias-form.js') }}"></script>

    <script type="text/javascript">
        // EVENTO CUANDO SE MUEVE EL SCROLL, EL MISMO APLICA TAMBIEN CUANDO SE RESIZA
        var change= false;
        $(window).scroll(function(){
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
@stop
