<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbBanner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_banner', function (Blueprint $table) {
            $table->increments('id_banner');
            $table->string('titulo',255)->nullable();
            $table->string('descricao',255)->nullable();
            $table->string('url_botao',255)->nullable();
            $table->string('nome_botao',255)->nullable();
            $table->string('imagem',500)->nullable();
            $table->integer('excluido')->default(0);
            $table->integer('is_mobile')->default(0);
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
        Schema::dropIfExists('tb_banner');
    }
}
