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
    .checkbox input[type="checkbox"]:disabled + label {
        opacity: 0.65; }
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
<template>
    <div class="panel-body">
        <fieldset class="box-style">
            <div class="row">
                <div class="form-group col-md-2">
                    <label for="factura">No. Factura</label>
                    <input type="number" id="factura" name="code" class="form-control box-style" v-model="factura" @blur="onBlurOut()">
                </div>

                <div class="col-md-7 form-group">
                    <label for="paciente">Paciente</label>
                    <input type="text" id="paciente" class="form-control box-style" v-model="facturas.nombre_completo_cliente">
                </div>

                <div class="col-md-3 form-group">
                    <label>Edad</label>
                    <input type="text" id="edad" class="form-control box-style" v-model="changeDate" disabled>
                </div>
            </div>

            <div class="row">

                <div class="col-md-4 form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="text" id="email" class="form-control box-style" v-model="facturas.correo">
                </div>

                <div class="col-md-6 form-group">
                    <label for="email">Dirección de Entrega</label>
                    <input type="text" id="direccion" class="form-control box-style" v-model="facturas.direccion_entrega_sede">
                </div>

                <div class="col-md-2 form-group">
                    <label for="sexo">Sexo</label>
                    <input type="text" id="sexo" class="form-control box-style" v-model="facturas.sexo">
                </div>
            </div>

            <div class="row">
                <div class="col-md-7"></div>
                <div class="col-md-5 form-group">
                    <label for="medico">Medico</label>
                    <input type="text" id="medico" class="form-control box-style" v-model="facturas.medico">
                </div>
                <div class="col-md-12">
                    <hr class="white-hr">
                </div>
            </div>

            <div class="row">

                <div class="form-group col-md-3">
                    <br>
                    <div class="checkbox checkbox-info">
                        <input id="checkbox2" type="checkbox" v-model="DetCancer">
                        <label for="checkbox2">
                            Detección de Cancer
                        </label>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <br>
                    <div class="checkbox checkbox-info">
                        <input id="checkbox1" type="checkbox" v-model="IndMaduracion">
                        <label for="checkbox1">
                            Indice de Maduración
                        </label>
                    </div>

                </div>

                <div class="form-group col-md-6">
                    <label for="otros1">Otros</label>
                    <input type="text" id="otros1" name="otros" class="form-control" v-model="otros1" placeholder="Otros">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <textarea type="text" name="diagnostico" class="textarea form-control ckeditor" v-model="diagnostico"></textarea>

                </div>
                <div class="col-md-12">
                    <h6>Plantillas</h6>
                    <ul class="nav nav-pills">
                        <li role="presentation"><a href="#">Diagnostico 1</a></li>
                        <li role="presentation"><a href="#">Diagnostico 2</a></li>
                    </ul>
                    <hr/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <pre>{{ $data }}</pre>
                </div>
            </div>

        </fieldset>
    </div>
</template>

<script>
    import axios from 'axios';
    import {Errors} from './Errors';
    import moment from 'moment';

    export default {
        data(){
            return{
                error: new Errors(),
                factura:'',
                facturas:{
                    "id": 1,
                    "num_factura": '',
                    "num_cedula": '',
                    "nombre_completo_cliente": "",
                    "fecha_nacimiento": "",
                    "correo": "",
                    "direccion_entrega_sede": "",
                    "medico": "",
                    "status": "",
                    "sexo": "",
                },
                "DetCancer": false,
                "IndMaduracion": false,
                "otros1": "",
                "diagnostico": '',
            }
        },
                 //TODO: Hacer sistema de plantillas!!!
        methods:{//TODO: Cambiar dirección windos/linux
            onBlurOut: function(){
               axios.get('/pplabmed/public/facturas/' + this.factura)
                    .then(function(response){
                        this.facturas = response.data;
                    }.bind(this))
                    .catch(function (error){
                        console.log(error);
                    }.bind(this));
            },

            onSubmit: function(e){
                e.preventDefault();

            },
        },
        computed:{
            changeDate:function(){
                if(this.facturas.fecha_nacimiento){
                    const mydate = new Date(this.facturas.fecha_nacimiento);
                    var a = moment(new Date());
                    var b = moment(mydate);
                    var years = a.diff(b, 'year');
                    b.add(years, 'years');

                    var months = a.diff(b, 'months');
                    b.add(months, 'months');

                    var days = a.diff(b, 'days');
                    return years + ' años ' + months + ' meses ' + days + ' días';
                }
            }
        }
    };
</script>