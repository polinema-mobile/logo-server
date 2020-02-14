<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEnablerToConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('config', function (Blueprint $table) {
            //
            $table->boolean('ads_enable')->default(1);
            $table->boolean('banner_enable')->default(1);
            $table->boolean('inters_enable')->default(1);
            $table->boolean('rewarded_enable')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('config', function (Blueprint $table) {
            //
            $table->dropColumn('ads_enable');
            $table->dropColumn('banner_enable');
            $table->dropColumn('inters_enable');
            $table->dropColumn('rewarded_enable');
        });
    }
}
