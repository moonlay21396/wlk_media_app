<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['id', 'name','movie','actor','actress','director','running_time','released_year','company_id'];
}
