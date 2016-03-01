<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQ7AField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diabetes_a1cs', function ($table) {
            $table->string('q7_a')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diabetes_a1cs', function ($table) {
            $table->dropColumn('q7_a');
        });
    }
}
