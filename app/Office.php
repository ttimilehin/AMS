<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $table = 'office';
    protected $primarykey = 'id';
    protected $fillable = ['office'];

}


