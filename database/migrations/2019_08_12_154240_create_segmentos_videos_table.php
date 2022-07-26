<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegmentosVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_segmentos_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_segmento')->unsigned();
            $table->integer('id_video')->unsigned();
            $table->timestamps();

            $table->foreign('id_segmento')->references('id')->on('tb_segmentos');
            $table->foreign('id_video')->references('id')->on('tb_videos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('segmentos_videos');
    }
}
