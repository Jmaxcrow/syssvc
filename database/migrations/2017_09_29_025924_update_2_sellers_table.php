<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update2SellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('sellers', function($table) {
            $table->integer('inserted_by')->unsigned()->nullable()->change();
            $table->integer('idTelemarketer')->unsigned()->nullable()->change();
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
