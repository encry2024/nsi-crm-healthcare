<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemographics2ndQtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demographics_2nd_qts', function (Blueprint $blueprint) {
            $blueprint->increments('id');
            $blueprint->string('q1')->nullable();
            $blueprint->string('q2')->nullable();
            $blueprint->string('q3');
            $blueprint->string('q4')->nullable();
            $blueprint->string('q5')->nullable();
            $blueprint->string('q6')->nullable();
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
        Schema::drop('demographics_2nd_qts');
    }
}
