@extends('layouts.app-form')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/home">Inicio</a></li>
        <li><a href="{{ action('CitologiaController@index') }}">Listado de Citologías</a></li>
        <li class="active">Edición de Citología factura #{{ $item->factura_id }}</li>
    </ol>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted pull-right">
                            <a onclick="window.open('{{ action('PrintController@formatoCitologia', $item->id) }}', '_blank', 'location=no,height=755.90,width=699.21,menubar=no,status=no,location=no,toolbar=no,scrollbars=yes,directories=no');" class="btn btn-info" alt="Buscar" ><span class="glyphicon glyphicon-print"></span> EN</a>
                            <a href="{{ action('CitologiaController@create') }}" class="btn btn-info" alt="Crear" ><span class="glyphicon glyphicon-plus"></span></a>
                        </div>
                        <h4>Agregar de Citología</h4>
                    </div>
                    <div class="panel-body" id="app">
                        {!! Form::model($item, ['action' => ['CitologiasEngController@updateTrans', $item->serial], 'id' => 'myForm', 'method' => 'POST']) !!}
                        @include('resultados.citologia._faturasPartial')
                        @include('resultados.citologia._citologiaPartial')
                        {!!  Form::close() !!}
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
            <div class="col-md-1">
                <label>No. de Citologia</label><br>
                <span class="name">{{ $item->serial }}</span>
            </div>

            <div class="col-md-3">
                <label>Nombre</label><br>
                <span class="name">{{ $item->facturas->nombre_completo_cliente }}</span>
            </div>
            <div class="col-md-3">
                <label>dirección</label><br>
                <span class="name">{{ $item->facturas->direccion_entrega_sede }}</span>
            </div>
        </div>
    </div>
    @include('resultados.citologia._edit_factura_modal')
    @include('resultados.citologia._repeat_factura_modal')
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
@stop
