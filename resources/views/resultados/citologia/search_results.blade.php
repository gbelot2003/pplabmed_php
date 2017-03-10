@extends('layouts.app-form')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @foreach($items as $item)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted pull-right">
                            <a class="btn btn-warning" alt="Buscar" ><span class="glyphicon glyphicon-search" data-toggle="modal" data-target="#searchModal"></span></a>
                        </div>
                        <h4>Agregar de Citología</h4>
                    </div>
                    <div class="panel-body" id="app">
                        {!! Form::model($item, ['action' => ['CitologiaController@update', $item->id], 'method' => 'PATCH']) !!}
                        @include('resultados.citologia._faturasPartial')
                        @include('resultados.citologia._citologiaPartial')
                        {!!  Form::close() !!}
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-10 col-md-offset-1">
                {{ $items->links() }}
            </div>
        </div>
    </div>
@stop

@section('jscode')
    <script src="{{ asset('js/citologias-form.js') }}"></script>
@stop
@section('modals')
    @include('resultados.citologia._modal_search')
@stop