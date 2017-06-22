@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Form::hidden('selector', 'usuarios/state', ['id' => 'selector1']) }}
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted pull-right">
                            <a href="{{ action('UserController@create') }}" class="btn btn-info"
                               alt="Crear Citologia"><span class="glyphicon glyphicon-plus"></span></a>
                        </div>
                        <h4>Listado de Usuarios</h4>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered datatable-area">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nombre</th>
                                <th>Correo Electrónico</th>
                                <th>Rol</th>
                                @if(Entrust::can('manage-users'))
                                    <th>Estado</th>
                                    <th>Editar</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td class="id">{{ $item->id }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @foreach($item->roles as $rol)
                                            {{ $rol->display_name }}
                                        @endforeach
                                    </td>
                                    @if(Entrust::can('manage-users'))
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
                                        <td><a href="{{ action('UserController@edit', $item->id) }}">Editar</a></td>
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
        .checkcol {
            width: 10rem;
        }
    </style>
@stop