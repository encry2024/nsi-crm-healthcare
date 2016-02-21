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
            $blueprint->string('q1');
            $blueprint->string('q2');
            $blueprint->string('q3');
            $blueprint->string('q4');
            $blueprint->string('q5');
            $blueprint->string('q6');
            $blueprint->string('q7');
            $blueprint->string('q8');
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
