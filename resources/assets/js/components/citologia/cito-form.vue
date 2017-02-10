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
                    <input type="text" id="paciente" class="form-control box-style" v-model="changeDate" disabled>
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
            </div>
            <hr>
            <div class="row">
                <div class="form-group col-md-3 box-style">
                    <label for="DetCancer">Detección de Cancer</label>
                    <input type="checkbox" id="DetCancer" class="box-style" v-model="datos.DetCancer">
                </div>

                <div class="form-group col-md-3 box-style">
                    <label for="IndMaduracion">Indice de Maduración</label>
                    <input type="checkbox" id="IndMaduracion" class="box-style" v-model="datos.IndMaduracion">

                </div>

                <div class="form-group col-md-6 box-style">
                    <label for="otros1">Otros</label>
                    <input type="text" id="otros1" class="form-control box-style" v-model="datos.otros1">
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
                datos:{
                    "DetCancer": false,
                    "IndMaduracion": false,
                    "otros1": false
                },



            }
        },

        methods:{//TODO: Cambiar dirección windos/linux
            onBlurOut: function(){
               axios.get('/facturas/' + this.factura)
                    .then(function(response){
                        this.facturas = response.data;

                    }.bind(this))
                    .catch(function (error){
                        console.log(error);
                    }.bind(this));
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