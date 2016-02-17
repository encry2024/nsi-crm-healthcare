<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHighRiskMedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('high_risk_meds', function(Blueprint $blueprint) {
            $blueprint->increments('id');
            $blueprint->integer('user_id')->unsigned();
            $blueprint->string('q1');
            $blueprint->string('q2');
            $blueprint->string('q3');
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
        Schema::drop('high_risk_meds');
    }
}
