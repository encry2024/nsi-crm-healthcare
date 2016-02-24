<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloodPressuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_pressures', function(Blueprint $blueprint) {
            $blueprint->increments('id');
            $blueprint->integer('record_id')->unsigned();
            $blueprint->integer('user_id')->unsigned();
            $blueprint->string('q1')->nullable();
            $blueprint->string('q2')->nullable();
            $blueprint->string('q3')->nullable();
            $blueprint->string('q4')->nullable();
            $blueprint->string('q5')->nullable();
            $blueprint->string('q6')->nullable();
            $blueprint->string('q7')->nullable();
            $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('blood_pressures');
    }
}
