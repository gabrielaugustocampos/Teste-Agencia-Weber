<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbLocalizacaoTexto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_localizacao_texto', function (Blueprint $table) {
            $table->increments('id_localizacao_texto');
            $table->longText('nome')->nullable();
            $table->tinyInteger('excluido')->default(0);
            $table->tinyInteger('is_product')->default(0);
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
        Schema::dropIfExists('tb_localizacao_texto');
    }
}
