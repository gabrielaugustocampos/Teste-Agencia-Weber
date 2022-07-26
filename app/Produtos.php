<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
  protected $table = 'tb_produtos';
  protected $primaryKey = 'id_produto';


  public function icones()
  {
      return $this->hasMany('App\Icone', 'id_texto');
  }

  public function saveIcons($icons = array()){

    foreach ($icons as $icon) {

      isset($icon['id']) ?
       $this->icones()->where('id', $icon['id'])->update($icon):
       $this->icones()->create($icon);

    }
  }

  public function categorias() {
    return $this->belongsToMany('App\Categoria', 'tb_categorias_tb_texto', 'id_texto_cat', 'id_categoria')->withTimestamps();
  }
}
