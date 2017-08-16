<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConsumerProfileIdToConsumers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consumers', function (Blueprint $table) {
            $table->integer('consumerprofile_id')->nullable()->unsigned()->after('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consumers', function (Blueprint $table) {
            $table->dropColumn('consumerprofile_id');
        });
    }
}
