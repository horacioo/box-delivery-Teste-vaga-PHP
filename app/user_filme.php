<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_filme extends Model
{
    protected $table="user_filmes";
    protected $fillable=['user_id','filme_id','like'];
}
