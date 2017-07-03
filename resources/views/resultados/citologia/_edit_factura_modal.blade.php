<!-- Modal -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="form-group col-md-6 {{ $errors->has('factura_id') ? ' has-error' : '' }}">
                        <label>No. de Factura</label>
                        {{ Form::number('factura_id', isset($item->facturas->name) ? $item->facturas->name : null,
                            ['class' => 'form-control box-style yellow', 'id' => 'factura', 'tabindex' => 1,'require', 'placeholder' => 'No. Factura'] ) }}
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('factura_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 form-group  {{ $errors->has('nombre_completo_cliente') ? ' has-error' : '' }}">
                        <label>Nombre Completo de Paciente</label>
                        {{ Form::text('nombre_completo_cliente', isset($item->facturas->nombre_completo_cliente) ? $item->facturas->nombre_completo_cliente : null,
                            ['class' => 'form-control box-style yellow', 'id' => 'paciente', 'require', 'placeholder' => 'Nombre del Paciente'] ) }}
                    </div>

                    <div class="col-md-6 form-group  {{ $errors->has('edad') ? ' has-error' : '' }}">
                        <label>Edad</label>
                        {{ Form::text('edad', isset($item->facturas->edad) ? $item->facturas->edad : null,
                            ['class' => 'form-control box-style yellow', 'id' => 'edad', 'placeholder' => 'Edad']) }}
                    </div>

                    <div class="col-md-6 form-group  {{ $errors->has('sexo') ? ' has-error' : '' }}">
                        <label>Sexo</label>
                        {{ Form::text('sexo', isset($item->facturas->sexo) ? $item->facturas->sexo : null,
                         ['class' => 'form-control box-style yellow', 'id' => 'sexo', 'placeholder' => 'Sexo']) }}
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 form-group  {{ $errors->has('correo') ? ' has-error' : '' }}">
                        <label>E-mail</label>
                        {{ Form::text('correo', isset($item->facturas->correo) ? $item->facturas->correo : null,
                            ['class' => 'form-control box-style yellow', 'id' => 'email', 'placeholder' => 'E-mail']) }}
                    </div>

                    <div class="col-md-6 form-group  {{ $errors->has('correo2') ? ' has-error' : '' }}">
                        <label>E-mail 2</label>
                        {{ Form::text('correo2', isset($item->facturas->correo2) ? $item->facturas->correo2 : null,
                            ['class' => 'form-control box-style yellow', 'id' => 'email', 'placeholder' => 'E-mail 2']) }}
                    </div>

                    <div class="col-md-6 form-group  {{ $errors->has('direccion_entrega_sede') ? ' has-error' : '' }}">
                        <label>Dirección de Entrega</label>
                        {{ Form::text('direccion_entrega_sede', isset($item->facturas->direccion_entrega_sede) ? $item->facturas->direccion_entrega_sede : null,
                            ['class' => 'form-control box-style yellow', 'id' => 'direccion', 'require', 'placeholder' => 'Dirección']) }}
                    </div>

                    <div class="col-md-6 form-group  {{ $errors->has('medico') ? ' has-error' : '' }}">
                        <label>Medico</label>
                        {!! Form::text('medico', isset($item->facturas->medico) ? $item->facturas->medico : null,
                            ['class' => 'form-control box-style yellow', 'id' => 'medico', 'placeholder' => 'Medico']) !!}
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>