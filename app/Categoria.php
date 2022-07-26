<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'tb_categorias';
    protected $fillable = ['nome'];

    public function texto() {
        return $this->belongsTo('App\Paginas', 'tb_categorias_tb_texto', 'id_categoria', 'id_texto_cat')->withTimestamps();
    }
}
