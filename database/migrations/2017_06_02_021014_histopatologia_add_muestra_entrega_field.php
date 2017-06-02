<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HistopatologiaAddMuestraEntregaField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('histopatologia', function (Blueprint $table) {
            $table->text('muestra_entrega')->nullable();
        });
    }
}
