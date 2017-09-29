<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubOriginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_origins', function (Blueprint $table) {
            $table->increments('idSubOrigin');
            $table->string('name', 10);
            $table->integer('ref_origin')->unsigned();
            $table->timestamps();
        });

        Schema::table('sub_origins', function($table) {            
            $table->foreign('ref_origin')->references('idOrigin')->on('origins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sub_origins');
    }
}
