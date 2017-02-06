@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Form::hidden('selector', 'areas/state', ['id' => 'selector1']) }}
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted pull-right">
                            <a href="{{ action('RolesController@create') }}" class="btn btn-info" alt="Crear Citologia"><span class="glyphicon glyphicon-plus"></span></a>
                        </div>
                        <h4>Listado de Roles</h4>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered datatable-area">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Editar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td class="id">{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->display_name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td><a href="{{ action('RolesController@edit', $item->id) }}">Editar</a></td>
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