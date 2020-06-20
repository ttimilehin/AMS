<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';
    protected $primarykey = 'id';
    protected $fillable = ['location'];

}


