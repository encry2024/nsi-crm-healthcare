<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubFieldsInQuestionnaireForms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('demographics', function ($table) {
            $table->string('q1_a')->after('q1')->nullable();
        });

        Schema::table('breast_cancer_screenings', function ($table) {
            $table->string('q1_a')->after('q1')->nullable();
        });

        Schema::table('breast_cancer_screenings', function ($table) {
            $table->string('q4_a')->after('q4')->nullable();
        });

        Schema::table('colon_cancer_screenings', function ($table) {
            $table->string('q1_a')->after('q1')->nullable();
        });

        Schema::table('colon_cancer_screenings', function ($table) {
            $table->string('q4_a')->after('q4')->nullable();
        });

        Schema::table('flu_vaccinations', function ($table) {
            $table->string('q1_a')->after('q1')->nullable();
        });

        Schema::table('flu_vaccinations', function ($table) {
            $table->string('q7_a')->after('q7')->nullable();
        });

        Schema::table('pneumonia_vaccinations', function ($table) {
            $table->string('q1_a')->after('q1')->nullable();
        });

        Schema::table('pneumonia_vaccinations', function ($table) {
            $table->string('q8_a')->after('q8')->nullable();
        });

        Schema::table('blood_pressures', function ($table) {
            $table->string('q7_a')->after('q7')->nullable();
        });

        Schema::table('blood_pressures', function ($table) {
            $table->string('q5_a')->after('q5')->nullable();
        });

        Schema::table('diabetes_a1cs', function ($table) {
            $table->string('q9_a')->after('q9')->nullable();
        });

        Schema::table('diabetes_eye_exams', function ($table) {
            $table->string('q12_a')->after('q12')->nullable();
        });

        Schema::table('diabetes_eye_exams', function ($table) {
            $table->string('q15_a')->after('q15')->nullable();
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
            $table->dropColumn('q1_a');
        });

        Schema::table('breast_cancer_screenings', function ($table) {
            $table->dropColumn('q1_a');
        });

        Schema::table('breast_cancer_screenings', function ($table) {
            $table->dropColumn('q4_a');
        });

        Schema::table('colon_cancer_screenings', function ($table) {
            $table->dropColumn('q1_a');
        });

        Schema::table('colon_cancer_screenings', function ($table) {
            $table->dropColumn('q4_a');
        });

        Schema::table('flu_vaccinations', function ($table) {
            $table->dropColumn('q1_a');
        });

        Schema::table('flu_vaccinations', function ($table) {
            $table->dropColumn('q7_a');
        });

        Schema::table('pneumonia_vaccinations', function ($table) {
            $table->dropColumn('q1_a');
        });

        Schema::table('pneumonia_vaccinations', function ($table) {
            $table->dropColumn('q8_a');
        });

        Schema::table('blood_pressures', function ($table) {
            $table->dropColumn('q7_a');
        });

        Schema::table('blood_pressures', function ($table) {
            $table->dropColumn('q5_a');
        });

        Schema::table('diabetes_a1cs', function ($table) {
            $table->dropColumn('q9_a');
        });

        Schema::table('diabetes_eye_exams', function ($table) {
            $table->dropColumn('q12_a');
        });

        Schema::table('diabetes_eye_exams', function ($table) {
            $table->dropColumn('q15_a');
        });
    }
}
