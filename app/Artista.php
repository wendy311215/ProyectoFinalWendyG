<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    protected $table = "artists";
    protected $primaryKey = "ArtistId";
    public $timestamps = false;

    //Relacionar Artista - Albumes
    //Relacion 1-m: hasMany: metodo Eloquent
    public function albumes(){
       return $this->hasMany('App\Album', 'ArtistId');
    }
}
