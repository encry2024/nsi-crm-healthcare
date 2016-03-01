<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdditionalFormFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('demographics', function ($table) {
            $table->string('q4_a')->nullable();
            $table->string('q6_a')->nullable();
            $table->string('q2_a')->nullable();
        });

        Schema::table('breast_cancer_screenings', function ($table) {
            $table->string('q2_a')->nullable();
            $table->string('q3_a')->nullable();
            //$table->string('q4_a')->nullable();
        });

        Schema::table('colon_cancer_screenings', function ($table) {
            $table->string('q2_a')->nullable();
            $table->string('q3_a')->nullable();
            //$table->string('q4_a')->nullable();
        });

        Schema::table('flu_vaccinations', function ($table) {
            //$table->string('q7_a')->nullable();
            $table->string('q2_a')->nullable();
            $table->string('q3_a')->nullable();
        });

        Schema::table('pneumonia_vaccinations', function ($table) {
            $table->string('q4_a')->nullable();
            $table->string('q5_a')->nullable();
            //$table->string('q8_a')->nullable();
        });

        Schema::table('blood_pressures', function ($table) {
            $table->string('q1_a')->nullable();
            $table->string('q3_a')->nullable();
            $table->string('q4_a')->nullable();
            //$table->string('q5_a')->nullable();
        });

        Schema::table('diabetes_a1cs', function ($table) {
            $table->string('q1_a')->nullable();
            $table->string('q2_a')->nullable();
            $table->string('q3_a')->nullable();
            $table->string('q5_a')->nullable();
            $table->string('q6_a')->nullable();
            //$table->string('q9_a')->nullable();
        });

        Schema::table('diabetes_eye_exams', function ($table) {
            $table->string('q17_a')->nullable();
            $table->string('q16_a')->nullable();
            //$table->string('q15_a')->nullable();
        });

        Schema::table('high_risk_meds', function ($table) {
            $table->string('q1_a')->nullable();
            $table->string('q4_a')->nullable();
        });

        Schema::table('others', function ($table) {
            $table->string('q12_a')->nullable();
            $table->string('q13_a')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('demographics', function ($table) {
            $table->dropColumn('q4_a');
            $table->dropColumn('q6_a');
            $table->dropColumn('q2_a');
        });

        Schema::table('breast_cancer_screenings', function ($table) {
            $table->dropColumn('q2_a');
            $table->dropColumn('q3_a');
            //$table->dropColumn('q4_a');
        });

        Schema::table('colon_cancer_screenings', function ($table) {
            $table->dropColumn('q2_a');
            $table->dropColumn('q3_a');
            //$table->dropColumn('q4_a');
        });

        Schema::table('flu_vaccinations', function ($table) {
            //$table->dropColumn('q7_a');
            $table->dropColumn('q2_a');
            $table->dropColumn('q3_a');
        });

        Schema::table('pneumonia_vaccinations', function ($table) {
            $table->dropColumn('q4_a');
            $table->dropColumn('q5_a');
            //$table->dropColumn('q8_a');
        });

        Schema::table('blood_pressures', function ($table) {
            $table->dropColumn('q1_a');
            $table->dropColumn('q3_a');
            $table->dropColumn('q4_a');
            //$table->dropColumn('q5_a');
        });

        Schema::table('diabetes_a1cs', function ($table) {
            $table->dropColumn('q1_a');
            $table->dropColumn('q2_a');
            $table->dropColumn('q3_a');
            $table->dropColumn('q5_a');
            $table->dropColumn('q6_a');
            //$table->dropColumn('q9_a');
        });

        Schema::table('diabetes_eye_exams', function ($table) {
            $table->dropColumn('q17_a');
            $table->dropColumn('q16_a');
            //$table->dropColumn('q15_a');
        });

        Schema::table('high_risk_meds', function ($table) {
            $table->dropColumn('q1_a');
            $table->dropColumn('q4_a');
        });

        Schema::table('others', function ($table) {
            $table->dropColumn('q12_a');
            $table->dropColumn('q13_a');
        });
    }
}
