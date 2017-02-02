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
            $table->boolean('deteccion_cancer');
            $table->boolean('indice_maduracion');
            $table->string('otros');
            $table->text('diagnostico_clinico');
            $table->string('fur');
            $table->string('fup');
            $table->string('gravidad');
            $table->string('para');
            $table->integer('abortos');
            $table->integer('citologia_id');
            $table->integer('firma_id');
            $table->date('fecha_informe');
            $table->string('otros');
            $table->integer('firma2_id');
            $table->date('fecha_muestra');
            $table->text('informe');
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
