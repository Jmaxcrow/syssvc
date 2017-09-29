<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->increments('idWorker');
            $table->string('name', 50);
            $table->string('lastname', 75);
            $table->string('address', 100);
            $table->string('number_apt', 6);
            $table->string('city', 20);
            $table->string('state', 20);
            $table->string('zip_code', 8);
            $table->string('email', 50);
            $table->date('date_init');
            $table->string('payxcomission', 100);
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
        Schema::drop('workers');
    }
}
