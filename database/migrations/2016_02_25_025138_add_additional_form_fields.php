clear
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
        Schema::table('flu_vaccinations', function ($table) {
            $table->string('q7')->nullable();
        });

        Schema::table('pneumonia_vaccinations', function ($table) {
            $table->string('q9')->nullable();
        });

        Schema::table('diabetes_eye_exams', function ($table) {
            $table->string('q12')->nullable();
            $table->string('q13')->nullable();
            $table->string('q14')->nullable();
            $table->string('q15')->nullable();
            $table->string('q16')->nullable();
            $table->string('q17')->nullable();
            $table->string('q18')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('flu_vaccinations', function ($table) {
            $table->dropColumn('q7');
        });

        Schema::table('pneumonia_vaccinations', function ($table) {
            $table->dropColumn('q9');
        });

        Schema::table('diabetes_eye_exams', function ($table) {
            $table->dropColumn('q12');
            $table->dropColumn('q13');
            $table->dropColumn('q14');
            $table->dropColumn('q15');
            $table->dropColumn('q16');
            $table->dropColumn('q17');
            $table->dropColumn('q18');
        });
    }
}
