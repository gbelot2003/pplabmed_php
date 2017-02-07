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
            $table->integer('factura');
            $table->integer('identidad');
            $table->string('nombre');
            $table->date('nacimiento');
            $table->string('email');
            $table->text('direccion_entrega');
            $table->string('medico');
            $table->string('sexo');
            $table->integer('edad');
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
