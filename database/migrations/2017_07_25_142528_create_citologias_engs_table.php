<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitologiasEngsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citologias_engs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('serial')->unique();
            $table->integer('factura_id');
            $table->boolean('deteccion_cancer')->nullable();
            $table->boolean('indice_maduracion')->nullable();
            $table->string('otros_a')->nullable();
            $table->integer('gravidad')->nullable();//not null;
            $table->date('fur')->nullable();;//not null;;
            $table->date('fup')->nullable();;//not null;;
            $table->date('fecha_informe')->nullable();//not null;
            $table->date('fecha_muestra')->nullable();;//not null;
            $table->integer('para')->nullable();
            $table->integer('abortos')->nullable();
            $table->integer('icitologia_id');//not null;
            $table->integer('firma_id');//not null;
            $table->integer('firma2_id')->nullable();
            $table->text('otros_b')->nullable();
            $table->boolean('mm')->nullable();;
            $table->text('diagnostico')->nullable();;//not null
            $table->text('informe')->nullable();;//not null
            $table->integer('user_id')->nullable();//not null;
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
        Schema::dropIfExists('citologias_engs');
    }
}
