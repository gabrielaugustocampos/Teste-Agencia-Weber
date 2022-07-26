<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbArquivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_arquivos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 255);
            $table->string('descricao', 255)->nullable();
            $table->string('arquivo', 255);
            $table->string('imagem', 255);
            $table->integer('excluido')->default(0);
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
        Schema::dropIfExists('tb_arquivos');
    }
}
