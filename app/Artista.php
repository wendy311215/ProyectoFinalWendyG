<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    protected $table = "artists";
    protected $primarykey = "ArtistId";
    public $timestamps = false;
}
