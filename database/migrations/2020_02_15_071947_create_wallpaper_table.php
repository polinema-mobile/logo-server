<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWallpaperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallpaper', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('wallpaper_name');
            $table->string('url');
            $table->bigInteger('fk_category')->unsigned();
            $table->foreign('fk_category')->references('id')->on('category');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallpaper');
    }
}
