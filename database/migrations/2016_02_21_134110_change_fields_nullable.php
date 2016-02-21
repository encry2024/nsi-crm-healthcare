<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFieldsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('records', function($table) {
            $table->string('reference_no')->nullable()->change();
            $table->string('call_notes')->nullable()->change();
            $table->string('status')->nullable()->change();
            $table->string('status_date')->nullable()->change();
            $table->string('last_disposition')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
