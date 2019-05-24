<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class filmes extends Model
{
    protected $table='filmes';
    protected $fillable=['nome','sinopse','imagem','ano','generos_id',''];

    public function Generos(){
        return $this->belongsTo('App\genero');
    }
}
