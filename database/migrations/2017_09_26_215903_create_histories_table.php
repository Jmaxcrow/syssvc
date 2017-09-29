<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->increments('idHistory');
            $table->integer('client')->unsigned();
            $table->string('description', 100);
            $table->timestamps();
        });

        Schema::table('histories', function($table) {
            $table->foreign('client')->references('idClient')->on('clients');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('histories');
    }
}
