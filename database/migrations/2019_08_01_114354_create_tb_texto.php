<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbTexto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_texto', function (Blueprint $table) {
            $table->increments('id_texto');

            $table->integer('localizacao')->unsigned();
            $table->integer('galeria')->unsigned()->nullable();

            $table->string('titulo',255)->nullable();
            $table->longText('descricao')->nullable();
            $table->string('url',255)->nullable();
            $table->string('imagem',255)->nullable();
            $table->longText('texto')->nullable();
            $table->integer('destaque')->default(0);
            $table->integer('ativo')->default(0);
            $table->integer('excluido')->default(0);

            $table->timestamps();

            $table->foreign('localizacao')->references('id_localizacao_texto')->on('tb_localizacao_texto');
            $table->foreign('galeria')->references('id_localizacao_galeria')->on('tb_localizacao_galeria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_texto');
    }
}
