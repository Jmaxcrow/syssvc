<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->increments('idSeller');
            $table->integer('idUser')->unsigned();
            $table->integer('inserted_by')->unsigned();
            $table->integer('idTelemarketer')->unsigned();
            $table->foreign('idUser')->references('idUser')->on('users');
            $table->foreign('inserted_by')->references('idSeller')->on('sellers');
            $table->foreign('idTelemarketer')->references('idTelemarketer')->on('telemarketing');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
