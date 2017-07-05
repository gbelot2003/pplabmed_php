<!-- Modal -->
<div class="modal fade" id="repeatFactura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form id="facturasForm" action="/citologia/reescritura" method="POST">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Repetir Numero de Facturas</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>No. de Factura</label>
                            {{ csrf_field() }}
                            {{ Form::number('factura_id', null,
                                ['class' => 'form-control box-style yellow', 'id' => 'm_factura', 'tabindex' => 1,'require', 'placeholder' => 'No. Factura'] ) }}
                            {{ Form::hidden('id', $item->id) }}

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <p class="text-danger">Escriba el numero de factura que desea duplicar, recuerde que sobreescribira este
                                documento, deber hacer esto con sumo cuidado y entendiendo lo que hace</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>

        </div>
    </form>
</div>