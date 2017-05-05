<div class="modal fade" id="searchModal" tabindex="-2" role="dialog" aria-labelledby="searchModal">
    <div class="modal-dialog" role="document">
        {!! Form::open(['action' => 'HistopatologiaController@processForm', 'method' => 'POST']) !!}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Interface de Busqueda</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Fecha de Inicio</label>
                        {!! Form::date('inicio', null, ['class' => 'form-control', 'required']) !!}
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">Fecha Final</label>
                        {!! Form::date('fin', null, ['class' => 'form-control', 'required']) !!}
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>