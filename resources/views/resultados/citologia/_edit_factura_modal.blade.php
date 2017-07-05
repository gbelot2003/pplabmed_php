<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form id="formFactura">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edición de Facturas</h4>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="form-group col-md-6">
                        <label>No. de Factura</label>
                        {{ Form::number('factura_id', null,
                            ['class' => 'form-control box-style yellow', 'id' => 'm_factura', 'tabindex' => 1,'require', 'placeholder' => 'No. Factura', 'disabled'] ) }}

                    </div>

                    <div class="col-md-6 form-group  {{ $errors->has('nombre_completo_cliente') ? ' has-error' : '' }}">
                        <label>Nombre Completo de Paciente</label>
                        {{ Form::text('nombre_completo_cliente',  null,
                            ['class' => 'form-control box-style yellow', 'id' => 'm_paciente', 'require', 'placeholder' => 'Nombre del Paciente'] ) }}
                    </div>

                    <div class="col-md-6 form-group  {{ $errors->has('edad') ? ' has-error' : '' }}">
                        <label>Edad</label>
                        {{ Form::text('edad',  null,
                            ['class' => 'form-control box-style yellow', 'id' => 'm_edad', 'placeholder' => 'Edad']) }}
                    </div>

                    <div class="col-md-6 form-group  {{ $errors->has('sexo') ? ' has-error' : '' }}">
                        <label>Sexo</label>
                        {{ Form::text('sexo', null,
                         ['class' => 'form-control box-style yellow', 'id' => 'm_sexo', 'placeholder' => 'Sexo']) }}
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 form-group  {{ $errors->has('correo') ? ' has-error' : '' }}">
                        <label>E-mail</label>
                        {{ Form::text('correo',  null,
                            ['class' => 'form-control box-style yellow', 'id' => 'm_email', 'placeholder' => 'E-mail']) }}
                    </div>

                    <div class="col-md-6 form-group  {{ $errors->has('correo2') ? ' has-error' : '' }}">
                        <label>E-mail 2</label>
                        {{ Form::text('correo2',  null,
                            ['class' => 'form-control box-style yellow', 'id' => 'm_email2', 'placeholder' => 'E-mail 2']) }}
                    </div>

                    <div class="col-md-6 form-group  {{ $errors->has('direccion_entrega_sede') ? ' has-error' : '' }}">
                        <label>Dirección de Entrega</label>
                        {{ Form::text('direccion_entrega_sede', null,
                            ['class' => 'form-control box-style yellow', 'id' => 'm_direccion', 'require', 'placeholder' => 'Dirección']) }}
                    </div>

                    <div class="col-md-6 form-group  {{ $errors->has('medico') ? ' has-error' : '' }}">
                        <label>Medico</label>
                        {!! Form::text('medico',  null,
                            ['class' => 'form-control box-style yellow', 'id' => 'm_medico', 'placeholder' => 'Medico']) !!}
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