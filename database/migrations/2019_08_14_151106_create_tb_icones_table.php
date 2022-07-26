<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbIconesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_icones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_texto')->unsigned();
            $table->string('titulo')->nullable();
            $table->string('codigo_icone')->nullable();
            $table->longText('descricao')->nullable();

            $table->foreign('id_texto')->references('id_texto')->on('tb_texto');
            

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
        Schema::dropIfExists('tb_icones');
    }
}
