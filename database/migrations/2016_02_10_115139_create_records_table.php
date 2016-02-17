<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $blueprint) {
            $blueprint->increments('id');
            $blueprint->integer('user_id')->unsigned();
            $blueprint->string('first_name');
            $blueprint->string('last_name');
            $blueprint->string('btn');
            $blueprint->integer('age');
            $blueprint->integer('mrn');
            $blueprint->string('reference_no');
            $blueprint->date('date_of_birth');
            $blueprint->string('call_notes');
            $blueprint->string('status');
            $blueprint->dateTime('status_date');
            $blueprint->timestamps();
            $blueprint->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('records');
    }
}
