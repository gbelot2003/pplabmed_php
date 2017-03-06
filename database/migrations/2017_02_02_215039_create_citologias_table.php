<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitologiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citologias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('factura_id');
            $table->boolean('deteccion_cancer')->nullable();
            $table->boolean('indice_maduracion')->nullable();
            $table->string('otros_a')->nullable();
            $table->text('diagnostico_clinico');
            $table->date('fur')->nullable();
            $table->date('fup')->nullable();
            $table->integer('gravidad_id');
            $table->string('para')->nullable();
            $table->integer('abortos')->nullable();
            $table->integer('citologia_id');
            $table->integer('firma_id');
            $table->date('fecha_informe');
            $table->string('otros_b')->nullable();
            $table->integer('firma2_id')->nullable();
            $table->date('fecha_muestra');
            $table->boolean('mm')->nullable();
            $table->boolean('muestra')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('citologias');
    }
}
