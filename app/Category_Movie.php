<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_Movie extends Model
{
    protected $fillable = ['id', 'category_id','movie_id'];
}
