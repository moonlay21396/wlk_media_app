<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Starlist extends Model
{
    protected $fillable = [
        'id',
        'name',
        'position',
        'movie_id'
    ];
}
