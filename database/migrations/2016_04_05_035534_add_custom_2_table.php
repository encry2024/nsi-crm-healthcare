<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustom2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_2', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('record_id')->unsigned();
            $table->string('appt_date')->nullable();
            $table->string('appt_duration')->nullable();
            $table->string('appt_start_time')->nullable();
            $table->string('appt_type')->nullable();
            $table->string('patient_home_phone')->nullable();
            $table->string('patient_mobile_no')->nullable();
            $table->string('patient_work_phone')->nullable();
            $table->string('appt_note')->nullable();
            $table->string('appt_schdlng_prvdr')->nullable();
            $table->string('rndrng_prvdr')->nullable();
            $table->string('svc_dprtmnt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('custom_2');
    }
}
