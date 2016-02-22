<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColonCancerScreeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colon_cancer_screenings', function(Blueprint $blueprint) {
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
            $blueprint->string('q8')->nullable();
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
        Schema::drop('colon_cancer_screenings');
    }
}
