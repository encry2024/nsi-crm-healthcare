<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustom1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_1', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('record_id')->unsigned();
            $table->string('pcp')->nullable();
            $table->string('insurance')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('custom_1');
    }
}
