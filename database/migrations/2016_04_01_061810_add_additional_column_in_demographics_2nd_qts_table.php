<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdditionalColumnInDemographics2ndQtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('demographics_2nd_qts', function (Blueprint $blueprint) {
            $blueprint->integer('record_id');
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
        Schema::table('demographics_2nd_qts', function (Blueprint $table) {
            $table->dropColumn('record_id');
            $table->dropColumn('appt_date');
            $table->dropColumn('appt_duration');
            $table->dropColumn('appt_start_time');
            $table->dropColumn('appt_type');
            $table->dropColumn('patient_name');
            $table->dropColumn('patient_id');
            $table->dropColumn('patient_home_phone');
            $table->dropColumn('patient_mobile_no');
            $table->dropColumn('patient_work_phone');
            $table->dropColumn('appt_note');
            $table->dropColumn('appt_schdlng_prvdr');
            $table->dropColumn('rndrng_prvdr');
            $table->dropColumn('svc_dprtmnt');
            $table->dropColumn('date_reviewed');
            $table->dropColumn('missing_info');
            $table->dropColumn('past_due');
            $table->dropColumn('not_in_workflow');
            $table->dropColumn('needs_to_be_addressed_in_ov');
            $table->dropColumn('notes');
        });
    }
}
