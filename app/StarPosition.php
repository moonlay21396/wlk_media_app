<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StarPosition extends Model
{
    protected $fillable = [
        'id',
        'position_id',
        'star_id'
    ];
}
