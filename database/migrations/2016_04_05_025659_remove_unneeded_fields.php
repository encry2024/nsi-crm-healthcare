<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveUnneededFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('records', function (Blueprint $table) {
            $table->dropColumn(array('status_date', 'status', 'rn', 'reference_no'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->dateTime('status_date');
            $table->string('status');
            $table->string('rn');
            $table->string('reference_no');
        });
    }
}
