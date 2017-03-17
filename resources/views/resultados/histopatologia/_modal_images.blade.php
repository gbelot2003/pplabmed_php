<div class="modal fade" id="ImagesModal" tabindex="-2" role="dialog" aria-labelledby="ImagesModal">
    <div class="modal-dialog" role="document">
        {!! Form::open(['action' => 'ImagesController@uploadForm', 'method' => 'POST', 'files' => true]) !!}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Interface de Imagenes</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="fallback">
                            <input name="images"  type="file" multiple />
                            {!! Form::hidden('link_id', isset($link->id) ? $link->id : null) !!}
                        </div>
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