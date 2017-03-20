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
            $table->integer('serial');
            $table->integer('factura_id');
            $table->integer('link_id')->unique();
            $table->string('topog');
            $table->string('mor1');
            $table->string('mor2')->nullable();
            $table->integer('firma_id');
            $table->integer('firma2_id')->nullable();
            $table->string('diagnostico');
            $table->date('muestra');
            $table->date('fecha_informe');
            $table->date('fecha_biopcia');
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
        Schema::dropIfExists('histopatologias');
    }
}
