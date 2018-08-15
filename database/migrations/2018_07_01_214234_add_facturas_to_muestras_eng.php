<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFacturasToMuestrasEng extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('muestras_engs', function (Blueprint $table) {
            $table->integer('factura_id')->nullable();
        });
    }
}
