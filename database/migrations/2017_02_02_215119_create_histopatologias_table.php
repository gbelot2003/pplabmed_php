<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistopatologiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histopatologias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('factura_id');
            $table->text('diagnostico');
            $table->string('mor1');
            $table->string('muestra');
            $table->string('mor2');
            $table->date('fecha_informe');
            $table->integer('firma_id');
            $table->string('topog');
            $table->date('fecha_biopcia');
            $table->integer('firma2_id');
            $table->date('fecha_muestra');
            $table->text('description_biopsia');
            $table->text('diagnostico');
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
        Schema::dropIfExists('histopatologias');
    }
}
