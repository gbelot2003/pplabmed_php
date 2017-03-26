<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('examenes', function(Blueprint $table){
            $table->increments('id');
            $table->integer('num_factura');
            $table->string('nombre_examen');
            $table->timestamps();
        });

        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('num_factura')->unique();
            $table->string('num_cedula')->nullable();
            $table->string('nombre_completo_cliente');
            $table->dateTime('fecha_nacimiento')->nullable();
            $table->string('edad')->nullable();
            $table->string('correo')->nullable();
            $table->string('correo2')->nullable();
            $table->string('direccion_entrega_sede')->nullable();
            $table->string('medico')->nullable();
            $table->string('status')->nullable();
            $table->string('sexo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examenes');
        Schema::dropIfExists('facturas');
    }
}
