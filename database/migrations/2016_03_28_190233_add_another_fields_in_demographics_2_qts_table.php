<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAnotherFieldsInDemographics2QtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('demographics_2nd_qts', function(Blueprint $blueprint) {
            $blueprint->string('q1_a')->nullable()->after('q1');
            $blueprint->string('q2_a')->nullable()->after('q2');
            $blueprint->string('q6_a')->nullable()->after('q6');
            $blueprint->integer('user_id')->unsigned()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('demographics_2nd_qts', function(Blueprint $blueprint) {
            $blueprint->dropColumn('q1_a');
            $blueprint->dropColumn('q2_a');
            $blueprint->dropColumn('q6_a');
            $blueprint->dropColumn('user_id');
        });
    }
}
