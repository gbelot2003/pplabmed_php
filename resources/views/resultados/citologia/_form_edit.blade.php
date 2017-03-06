<div class="panel-body">

    <fieldset class="box-style">
        <div class="row">
            <div class="form-group col-md-10"></div>
            <div class="form-group col-md-2">
                <label>Numero Serial</label>
                {{ Form::text('serial', null , ['class' => 'form-control box-style', 'id' => 'serial1', 'disabled'] ) }}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-2">
                <label for="factura">No. Factura</label>
                {{ Form::text('factura_id', null, ['class' => 'form-control box-style', 'id' => 'factura', 'require'] ) }}
            </div>

            <div class="col-md-7 form-group">
                <label for="paciente">Paciente</label>
                {{ Form::text('paciente', $fact->nombre_completo_cliente, ['class' => 'form-control box-style', 'id' => 'paciente', 'require'] ) }}
            </div>

            <div class="col-md-3 form-group">
                <label>Edad</label>
                {{ Form::text('edad', $fact->edad, ['class' => 'form-control box-style', 'id' => 'edad']) }}
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 form-group">
                <label for="email">Correo Electrónico</label>
                {{ Form::text('email', $fact->correo, ['class' => 'form-control box-style', 'id' => 'email', 'require']) }}
            </div>

            <div class="col-md-6 form-group">
                <label for="direccion">Dirección de Entrega</label>
                {{ Form::text('direccion', $fact->direccion_entrega_sede, ['class' => 'form-control box-style', 'id' => 'direccion', 'require']) }}
            </div>

            <div class="col-md-2 form-group">
                <label for="sexo">Sexo</label>
                {{ Form::text('sexo', $fact->sexo, ['class' => 'form-control box-style', 'id' => 'sexo']) }}
            </div>
        </div>

        <div class="row">
            <div class="col-md-7"></div>
            <div class="col-md-5 form-group">
                <label for="medico">Medico</label>
                {!! Form::text('medico', $fact->medico, ['class' => 'form-control box-style', 'id' => 'medico', 'disabled']) !!}
            </div>
            <div class="col-md-12">
                <hr class="white-hr">
            </div>
        </div>

        <div class="row">

            <div class="form-group col-md-3">
                <br>
                <div class="checkbox checkbox-info">
                    <input id="checkbox2" type="checkbox" name="deteccion_cancer" value="1"
                        @if($item->deteccion_cancer == true) checked=""checked" @endif
                    >
                    <label for="checkbox2">
                        Detección de Cancer
                    </label>
                </div>
            </div>

            <div class="form-group col-md-3">
                <br>
                <div class="checkbox checkbox-info">
                    <input id="checkbox1" type="checkbox" name="indice_maduracion" value="1"
                           @if($item->indice_maduracion == true) checked=""checked" @endif
                    >
                    <label for="checkbox1">
                        Indice de Maduración
                    </label>
                </div>

            </div>

            <div class="form-group col-md-6">
                <label for="otros1">Otros</label>
                {{ Form::text('otros_a', null, ['class' => 'form-control', 'id' => 'otros_a']) }}
            </div>
        </div>


        <div class="row">
            <div class="col-md-3 form-group">
                <label for="fur">F.U.R</label>
                {{ Form::date('fur', null, ['class' => 'form-control', 'id' => 'fur']) }}
            </div>

            <div class="col-md-3 form-group">
                <label for="fup">F.U.P</label>
                {{ Form::date('fup', null, ['class' => 'form-control', 'id' => 'fup']) }}
            </div>

            <div class="col-md-6 form-group">
                <label for="fup">Gravidad</label>

                {{ Form::select('gravidad_id', $gravidad, null, ['class' => 'form-control']) }}
            </div>

        </div>

        <div class="row">
            <div class="col-md-6">
                <label>Id Cito:</label>
                {{ Form::select('citologia_id', $idCIto, null, ['class' => 'form-control']) }}

            </div>
            <div class="col-md-3 form-group">
                <label for="para">Para: </label>
                {{ Form::number('para', null, ['class' => 'form-control', 'id' => 'para']) }}
            </div>
            <div class="col-md-3">
                <label for="abortos">Abortos: </label>
                {{ Form::number('abortos', null, ['class' => 'form-control', 'id' => 'abortos']) }}
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 form-group">
                <label>Firma 1:</label>
                {{ Form::select('firma_id', $firmas, null, ['class' => 'form-control']) }}
            </div>

            <div class="col-md-6 form-group">
                <label>Fecha de Informe</label>
                {{ Form::date('fecha_informe', null, ['class' => 'form-control', 'id' => 'fechainforme']) }}

            </div>
        </div>

        <div class="row">
            <div class="col-md-6 form-group">
                <label>Firma 2:</label>
                {{ Form::select('firma2_id', $firmas, null, ['class' => 'form-control']) }}
            </div>

            <div class="col-md-6 form-group">
                <label>Fecha de Muestra</label>
                {{ Form::date('fecha_muestra', null, ['class' => 'form-control', 'id' => 'fechamuestra']) }}

            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="otros2">Otros:</label>
                {{ Form::text('otros_b', null, ['class' => 'form-control', 'id' => 'otros_b']) }}
            </div>

            <div class="col-md-3">
                <br>
                <div class="checkbox checkbox-info">
                    <input id="checkbox3" type="checkbox" name="mm" value="1"
                           @if($item->mm == true) checked="checked" @endif
                    >
                    <label for="checkbox3">
                        /MM
                    </label>
                </div>
            </div>

{{--            <div class="col-md-3">
                <br>
                <div class="checkbox checkbox-info">
                    <input id="checkbox4" type="checkbox" name="muestra" value="1"
                           @if($item->muestra == true) checked="checked" @endif
                    >
                    <label for="checkbox4">
                        Se retiene muestra?
                    </label>
                </div>
            </div>--}}

        </div>

        <div class="row">
            <div class="col-md-12">
                <label>Diagnóstico Clinico</label>
                {{ Form::textarea('diagnostico_clinico', null, ['class' => 'textarea form-control ckeditor', 'id' => 'diagnostico']) }}
            </div>
        </div>


        <div class="row">
            <hr class="white-hr">

           <div class="col-md-6">
               @if(Entrust::can('unbind-cito'))
               <div class="text-left">
                   <a id="unbind" class="btn btn-danger"  data-toggle="modal" data-target="#unbindModal">Anular</a>
               </div>
               @endif
           </div>


           <div class="col-md-6">
               <div class="text-right">
                   <a class="btn btn-info" href="{{ action('CitologiaController@index') }}">Cancelar</a>
                   <button type="submit" class="btn btn-primary">Guardar</button>
               </div>
           </div>
       </div>

        <div class="modal fade" id="unbindModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Anular Resultados</h4>
                    </div>
                    <div class="modal-body">
                        La operaciòn de anular esta Citología no se puede deshacer, esto afectara la numeración de las consecuentes Citologías, el numero serial de esta estara disponible al crear
                        una nueva Citologìa
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="{{ action('CitologiaController@unbind', $item->id) }}" class="btn btn-danger">Anular Citología</a>
                    </div>
                </div>
            </div>
        </div>
   </fieldset>
</div>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>