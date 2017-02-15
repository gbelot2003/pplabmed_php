<div class="panel-body">
    <form>
        <fieldset class="box-style">
            <div class="row">
                <div class="form-group col-md-2">
                    <label for="factura">No. Factura</label>
                    {{ Form::text('factura', null, ['class' => 'form-control box-style', 'id' => 'factura', 'require'] ) }}
                </div>

                <div class="col-md-7 form-group">
                    <label for="paciente">Paciente</label>
                    {{ Form::text('paciente', null, ['class' => 'form-control box-style', 'id' => 'paciente', 'require'] ) }}
                </div>

                <div class="col-md-3 form-group">
                    <label>Edad</label>
                    {{ Form::text('edad', null, ['class' => 'form-control box-style', 'id' => 'edad', 'require']) }}
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="email">Correo Electrónico</label>
                    {{ Form::text('email', null, ['class' => 'form-control box-style', 'id' => 'email', 'require']) }}
                </div>

                <div class="col-md-6 form-group">
                    <label for="direccion">Dirección de Entrega</label>
                    {{ Form::text('direccion', null, ['class' => 'form-control box-style', 'id' => 'direccion', 'require']) }}
                </div>

                <div class="col-md-2 form-group">
                    <label for="sexo">Sexo</label>
                    {{ Form::text('sexo', null, ['class' => 'form-control box-style', 'id' => 'sexo']) }}
                </div>
            </div>

            <div class="row">
                <div class="col-md-7"></div>
                <div class="col-md-5 form-group">
                    <label for="medico">Medico</label>
                    <input type="text" id="medico" class="form-control box-style">
                </div>
                <div class="col-md-12">
                    <hr class="white-hr">
                </div>
            </div>

            <div class="row">

                <div class="form-group col-md-3">
                    <br>
                    <div class="checkbox checkbox-info">
                        <input id="checkbox2" type="checkbox">
                        <label for="checkbox2">
                            Detección de Cancer
                        </label>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <br>
                    <div class="checkbox checkbox-info">
                        <input id="checkbox1" type="checkbox">
                        <label for="checkbox1">
                            Indice de Maduración
                        </label>
                    </div>

                </div>

                <div class="form-group col-md-6">
                    <label for="otros1">Otros</label>
                    {{ Form::text('otros1', null, ['class' => 'form-control', 'id' => 'otros1']) }}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label>Diagnóstico Clinico</label>
                    {{ Form::textarea('diagnostico', null, ['class' => 'textarea form-control ckeditor', 'id' => 'diagnostico']) }}
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="fur">F.U.R</label>
                    {{ Form::text('fur', null, ['class' => 'form-control', 'id' => 'fur']) }}
                </div>

                <div class="col-md-3 form-group">
                    <label for="fup">F.U.P</label>
                    {{ Form::text('fup', null, ['class' => 'form-control', 'id' => 'fup']) }}
                </div>

                <div class="col-md-6 form-group">
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <label>Id Cito:</label>
                    {{ Form::select('IdCito', $idCIto, null, ['class' => 'form-control']) }}

                </div>
                <div class="col-md-3 form-group">
                    <label for="para">Para: </label>
                    {{ Form::text('para', null, ['class' => 'form-control', 'id' => 'para']) }}
                </div>
                <div class="col-md-3">
                    <label for="abortos">Abortos: </label>
                    {{ Form::text('abortos', null, ['class' => 'form-control', 'id' => 'abortos']) }}
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Firma 1:</label>
                    {{ Form::select('firma1', $firmas, null, ['class' => 'form-control']) }}
                </div>

                <div class="col-md-6 form-group">
                    <label>Fecha de Informe</label>
                    {{ Form::date('fechainforme', null, ['class' => 'form-control', 'id' => 'fechainforme']) }}

                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Firma 2:</label>
                    {{ Form::select('firma2', $firmas, null, ['class' => 'form-control']) }}
                </div>

                <div class="col-md-6 form-group">
                    <label>Fecha de Muestra</label>
                    {{ Form::date('fechamuestra', null, ['class' => 'form-control', 'id' => 'fechamuestra']) }}

                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="otros2">Otros:</label>
                    {{ Form::text('otros2', null, ['class' => 'form-control', 'id' => 'otros2']) }}
                </div>

                <div class="col-md-3">
                    <br>
                    <div class="checkbox checkbox-info">
                        <input id="checkbox3" type="checkbox">
                        <label for="checkbox3">
                            /MM
                        </label>
                    </div>
                </div>

                <div class="col-md-3">
                    <br>
                    <div class="checkbox checkbox-info">
                        <input id="checkbox4" type="checkbox">
                        <label for="checkbox4">
                            Se retiene muestra?
                        </label>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <label>Informe</label>
                    <textarea name="informe" class="form-control ckeditor" cols="30" rows="10"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills">
                        <li role="presentation"><a href="#">Diagnostico 1</a></li>
                        <li role="presentation"><a href="#">Diagnostico 2</a></li>
                    </ul>
                </div>

                <div class="form-group col-md-3">
                    <br>
                    <div class="checkbox checkbox-info">
                        <input id="checkbox5" type="checkbox" >
                        <label for="checkbox5">
                            Adendum?
                        </label>
                    </div>
                </div>
            </div>

            <div class="row" v-if="show_ademdum">
                <div class="col-md-12 group-form">
                    <label>Adendum</label>
                    <textarea name="adendum" id="ademdum" cols="30" rows="10" class="form-control"></textarea>
                    {{ Form::textarea('adendum', null, ['class' => 'form-control ckeditor', 'id' => 'adendum']) }}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <hr class="white-hr">
                    <div class="text-right">
                        <a class="btn btn-danger" href="/pplabmed/public/citologias">Cancelar</a>
                        <!-- TODO: cambiar direccion al cambio de server-->
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<style>
    .checkbox {
        padding-left: 20px; }
    .checkbox label {
        display: inline-block;
        position: relative;
        padding-left: 5px; }
    .checkbox label::before {
        content: "";
        display: inline-block;
        position: absolute;
        width: 17px;
        height: 17px;
        left: 0;
        margin-left: -20px;
        border: 1px solid #cccccc;
        border-radius: 3px;
        background-color: #fff;
        -webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
        -o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
        transition: border 0.15s ease-in-out, color 0.15s ease-in-out; }
    .checkbox label::after {
        display: inline-block;
        position: absolute;
        width: 16px;
        height: 16px;
        left: 0;
        top: 0;
        margin-left: -20px;
        padding-left: 3px;
        padding-top: 1px;
        font-size: 11px;
        color: #555555; }
    .checkbox input[type="checkbox"] {
        opacity: 0; }
    .checkbox input[type="checkbox"]:focus + label::before {
        outline: thin dotted;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px; }
    .checkbox input[type="checkbox"]:checked + label::after {
        font-family: 'FontAwesome';
        content: "\f00c"; }

    .checkbox input[type="checkbox"]:disabled + label::before {
        background-color: #eeeeee;
        cursor: not-allowed; }
    .checkbox.checkbox-circle label::before {
        border-radius: 50%; }
    .checkbox.checkbox-inline {
        margin-top: 0; }

    .checkbox-primary input[type="checkbox"]:checked + label::before {
        background-color: #428bca;
        border-color: #428bca; }
    .checkbox-primary input[type="checkbox"]:checked + label::after {
        color: #fff; }

    .checkbox-danger input[type="checkbox"]:checked + label::before {
        background-color: #d9534f;
        border-color: #d9534f; }
    .checkbox-danger input[type="checkbox"]:checked + label::after {
        color: #fff; }

    .checkbox-info input[type="checkbox"]:checked + label::before {
        background-color: #5bc0de;
        border-color: #5bc0de; }
    .checkbox-info input[type="checkbox"]:checked + label::after {
        color: #fff; }

    .checkbox-warning input[type="checkbox"]:checked + label::before {
        background-color: #f0ad4e;
        border-color: #f0ad4e; }
    .checkbox-warning input[type="checkbox"]:checked + label::after {
        color: #fff; }

    .checkbox-success input[type="checkbox"]:checked + label::before {
        background-color: #5cb85c;
        border-color: #5cb85c; }
    .checkbox-success input[type="checkbox"]:checked + label::after {
        color: #fff; }
</style>