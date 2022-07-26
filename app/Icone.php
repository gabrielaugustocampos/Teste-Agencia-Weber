<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icone extends Model
{
       /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tb_icones';
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * @var array
     */
    protected $fillable = ['id_texto','titulo','codigo_icone','descricao', 'created_at', 'updated_at'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */


}
