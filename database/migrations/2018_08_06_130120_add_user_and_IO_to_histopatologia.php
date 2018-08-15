<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserAndIOToHistopatologia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('histopatologias', function (Blueprint $table) {
            $table->integer('user_id')->default(1)->nullable();
            $table->integer('io')->default(0)->nullable();
        });
    }
}
