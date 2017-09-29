<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update2OriginsSubOriginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('origins', function($table) {
            $table->string('name', 20)->unique()->change();
        });
        Schema::table('sub_origins', function($table) {
            $table->string('name', 10)->unique()->change();
        });
        Schema::table('zones', function($table) {
            $table->string('name', 20)->unique()->change();
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
