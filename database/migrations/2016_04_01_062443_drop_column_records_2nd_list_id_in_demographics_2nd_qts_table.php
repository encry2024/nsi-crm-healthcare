<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnRecords2ndListIdInDemographics2ndQtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('demographics_2nd_qts', function (Blueprint $table) {
            $table->dropColumn('records_2nd_list_id');
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
            //
        });
    }
}
