<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('idClient');
            $table->string('phone_number', 15)->unique();
            $table->string('house_phone_number', 15)->unique();
            $table->string('name', 50);
            $table->string('lastname', 75);
            $table->string('address', 100);
            $table->string('number_apt', 6);
            $table->string('city', 20);
            $table->string('state', 20);
            $table->string('zip_code', 8);
            $table->date('birthday');
            $table->string('sex', 1);
            $table->string('isClient', 1);
            $table->string('hasWorks', 1);
            $table->string('count_number', 20);
            $table->date('date_origin');
            $table->time('time_origin');
            $table->string('commentaries', 150);
            $table->integer('origin')->unsigned();
            $table->integer('sub_origin')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->timestamps();
        });

        Schema::table('clients', function($table) {
            $table->foreign('origin')->references('idOrigin')->on('origins');
            $table->foreign('sub_origin')->references('idSubOrigin')->on('sub_origins');
            $table->foreign('created_by')->references('idUser')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clients');
    }
}
