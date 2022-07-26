<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegmentosCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_segmentos_cases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_segmento')->unsigned();
            $table->integer('id_case')->unsigned();
            $table->timestamps();

            $table->foreign('id_segmento')->references('id')->on('tb_segmentos');
            $table->foreign('id_case')->references('id')->on('tb_cases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('segmentos_cases');
    }
}
