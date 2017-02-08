@extends('layouts.app')

@section('content')
    {{ Form::hidden('selector', 'firmas/state', ['id' => 'selector1']) }}
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted pull-right">
                            @if(Entrust::can('create-firmas'))
                            <a href="{{ action('FirmasController@create') }}" class="btn btn-info" alt="Crear Citologia"><span class="glyphicon glyphicon-plus"></span></a>
                            @endif
                        </div>
                        <h4>Listado de Firmas</h4>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered datatable-area-firmas">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nombre</th>
                                <th>Codigo de Busqueda</th>
                                @if(Entrust::can('edit-firmas'))
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
                                    <td>{{ $item->code }}</td>
                                    @if(Entrust::can('edit-firmas'))
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
                                    <td><a href="{{ action('FirmasController@edit', $item->id) }}">Editar</a></td>
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

@section('jscode')
    <script>
        $(function() {
            var selector = $("#selector1");
            var url = (selector.val());

            function sendDataToServer(id, ch, selector){
                if(ch === true){
                    var state = 1;
                    $.get('/pplab/public/' + selector + '/' + id + '/' + state)
                        .done(function(data){
                            toastr.success('Has activado el permiso de <strong style="text-decoration: underline">' + data + '</strong> exitosamente!!');
                        }).fail(function(data){
                        var status = data.status;
                        var statusText = data.statusText;
                        toastr.error(`Hubo algun problema, el servidor tiene "Status:" ${status}, mensaje de error es: ${statusText}`);
                    });

                } else if(ch === false) {
                    var state = 0;
                    $.get('/pplab/public/' + selector + '/' + id + '/' + state)
                        .done(function(data){
                            toastr.info('Has desactivado el permiso de <strong style="text-decoration: underline">' + data + '</strong> exitosamente!!');
                        }).fail(function(data){
                        var status = data.status;
                        var statusText = data.statusText;
                        toastr.error(`Hubo algun problema, el servidor tiene "Status:" ${status}, mensaje de error es: ${statusText}. Los cambios no se salvaron`);
                    });
                }
            }

            $('.datatable-area-firmas').dataTable({
                "ordering": true,
                "fnDrawCallback": function () {
                    $('.toggle .emiter').on('change', function () {
                        var id = $(this).val();
                        var ch = $(this).is(':checked');
                        sendDataToServer(id, ch, url);
                    });
                },
                "columnDefs": [
                    {orderable: false, targets: [3]},
                    {orderable: false, targets: [4]}
                ],
                "order": [[0, 'desc']],
                "language": {
                    "emptyTable": "No hay datos disponibles para esta tabla",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                    "infoFiltered": "(Filtrando desde _MAX_ total de entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrando _MENU_ entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "No hay coincidencias",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": Ordenando por columnas asendente",
                        "sortDescending": ": Ordenando por columnas desendente"
                    },
                }
            });
        });
    </script>
@stop