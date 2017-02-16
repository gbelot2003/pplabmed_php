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
           $table->integer('factura_id');
           $table->string('name');
           $table->timestamps();
        });

        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('num_factura');
            $table->integer('num_cedula');
            $table->string('nombre_completo_cliente');
            $table->date('fecha_nacimiento');
            $table->string('edad')->nullable();
            $table->string('correo');
            $table->string('direccion_entrega_sede');
            $table->string('medico');
            $table->string('status');
            $table->string('sexo');
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
