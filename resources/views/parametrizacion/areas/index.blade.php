@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Form::hidden('selector', 'areas/state', ['id' => 'selector1']) }}
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted pull-right">
                            @if(Entrust::can('create-area'))
                                <a href="{{ action('AreaController@create') }}" class="btn btn-info" alt="Crear Citologia"><span class="glyphicon glyphicon-plus"></span></a>
                            @endif
                        </div>
                        <h4>Listado de Areas</h4>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered datatable-area">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nombre</th>
                                    @if(Entrust::can('edit-area'))
                                    <th>Estado</th>
                                    <th>Editar</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td class="id">{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    @if(Entrust::can('edit-area'))
                                    <td class="checkcol">
                                        <label>
                                            {!! Form::checkbox('status', $item->id , $item->status,
                                                [
                                                'data-toggle' => 'toggle',
                                                'data-on' => 'Activo',
                                                'data-off' => 'Desactivado',
                                                'class' => 'emiter'
                                                ])
                                            !!}
                                        </label>
                                    </td>
                                    <td><a href="{{ action('AreaController@edit', $item->id) }}">Editar</a></td>
                                    @endif

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css">
        .checkcol{
            width: 10rem;
        }
    </style>
@stop