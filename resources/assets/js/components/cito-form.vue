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
                    <label for="edad">Edad</label>
                    {{ resposes }}
                    <!--<input type="text" id="edad" class="form-control box-style" v-model="facturas.fecha_nacimiento">-->

                </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="text" id="email" class="form-control box-style" v-model="facturas.correo">
                </div>

                <div class="col-md-6 form-group">
                    <label for="email">Dirección</label>
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
        </fieldset>
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import {Errors} from './Errors'

    export default {
        data(){
            return{
                error: new Errors(),
                factura:'',
                facturas:[],
                resposes:''

            }
        },

        methods:{//TODO: Cambiar dirección windos/linux
            onBlurOut: function(){
               axios.get('/pplab/public/facturas/' + this.factura)
                    .then(function(response){
                        console.log(response)
                        this.facturas = response.data;
                        changeText(this.facturas.fecha_nacimiento)

                    }.bind(this))
                    .catch(function (error){
                        console.log(error);
                    }.bind(this));
            },

        },

    };
</script>