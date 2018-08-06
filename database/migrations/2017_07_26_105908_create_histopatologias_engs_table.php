<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistopatologiasEngsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histopatologias_engs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('serial')->unique();
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
            $table->text('muestra_entrega')->nullable();
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
        Schema::dropIfExists('histopatologias_engs');
    }
}
