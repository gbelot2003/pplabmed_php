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
            $table->boolean('locked_at', false)->nullable();
            $table->integer('locked_user')->nullable();
            $table->integer('factura_id');
            $table->integer('link_id')->unique();
            $table->string('topog')->nullable();
            $table->string('mor1')->nullable();
            $table->string('mor2')->nullable();
            $table->integer('firma_id');
            $table->integer('firma2_id')->nullable();
            $table->text('diagnostico')->nullable();
            $table->text('muestra')->nullable();
            $table->date('fecha_informe')->nullable();
            $table->date('fecha_biopcia')->nullable();
            $table->date('fecha_muestra')->nullable();
            $table->text('informe')->nullable();
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
