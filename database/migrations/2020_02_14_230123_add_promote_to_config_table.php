<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPromoteToConfigTable extends Migration
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
            $table->boolean('promote_enable')->default(1);
            $table->string('promote_url');
            $table->string('promote_image');
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
            $table->dropColumn('promote_enable');
            $table->dropColumn('promote_url');
            $table->dropColumn('promote_image');
        });
    }
}
