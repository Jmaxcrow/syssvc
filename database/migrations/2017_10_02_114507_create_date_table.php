<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dates', function (Blueprint $table) {
            $table->increments('idDate');
            $table->integer('idClient')->unsigned();
            $table->integer('idTelemarketer')->unsigned();
            $table->string('address', 100);
            $table->string('number_apt', 6);
            $table->string('city', 20);
            $table->string('state', 20);
            $table->string('zip_code', 8);
            $table->integer('owner')->unsigned();
            $table->integer('guest')->unsigned();
            $table->text('notes');
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
        Schema::drop('dates');
    }
}
