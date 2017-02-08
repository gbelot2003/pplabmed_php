<template>
    <div class="panel-body">
        <fieldset class="box-style">
            <div class="row">
                <div class="form-group col-md-2">
                    <label for="factura">No. Factura</label>
                    <input type="number" id="factura" name="code" class="form-control box-style" v-model="factura" @blur="onBlurOut()">
                </div>

                <div class="col-md-8 form-group">
                    <label for="paciente">Paciente</label>
                    <input type="text" id="paciente" class="form-control box-style" v-model="paciente">
                </div>

                <div class="col-md-2 form-group">
                    <label for="edad">Paciente</label>
                    <input type="text" id="edad" class="form-control box-style" v-model="edad">
                </div>

            </div>

            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="text" id="email" class="form-control box-style" v-model="email">
                </div>

                <div class="col-md-6 form-group">
                    <label for="email">Dirección</label>
                    <input type="text" id="direccion" class="form-control box-style" v-model="direccion">
                </div>

                <div class="col-md-2 form-group">
                    <label for="sexo">Sexo</label>
                    <input type="text" id="sexo" class="form-control box-style" v-model="sexo">
                </div>
            </div>

            <div class="row">
                <div class="col-md-7"></div>
                <div class="col-md-5 form-group">
                    <label for="medico">Medico</label>
                    <input type="text" id="medico" class="form-control box-style" v-model="medico">
                </div>
            </div>
        </fieldset>
        <div class="row">
            <div class="col-md-12">
                <pre>{{ $data }}</pre>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data(){
            return{
                factura:'',
                paciente:'',
                edad:'',
                email:'',
                direccion:'',
                sexo:'',
                medico:''
            }
        },

        methods:{
            onBlurOut: function(){
                axios.get('/pplab/public/facturas/' + this.factura)
                    .then(function(response){
                        console.log(response);
                    })
                    .catch(function (error){
                        console.log(error);
                    });
            },
        }
    };
</script>