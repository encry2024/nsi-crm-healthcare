<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecords2ndListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records_2nd_lists', function (Blueprint $blueprint) {
            $blueprint->increments('id');
            $blueprint->string('appt_date');
            $blueprint->string('appt_duration');
            $blueprint->string('appt_start_time');
            $blueprint->string('appt_type');
            $blueprint->string('patient_name');
            $blueprint->string('patient_id');
            $blueprint->string('patient_home_phone');
            $blueprint->string('patient_mobile_no')->nullable();
            $blueprint->string('patient_work_phone')->nullable();
            $blueprint->string('appt_note')->nullable();
            $blueprint->string('appt_schdlng_prvdr');
            $blueprint->string('rndrng_prvdr')->nullable();
            $blueprint->string('svc_dprtmnt');
            $blueprint->date('date_reviewed');
            $blueprint->string('missing_info')->nullable();
            $blueprint->string('past_due')->nullable();
            $blueprint->string('not_in_workflow')->nullable();
            $blueprint->string('needs_to_be_addressed_in_ov')->nullable();
            $blueprint->integer('user_id')->unsigned();
            $blueprint->string('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('records_2nd_lists');
    }
}
