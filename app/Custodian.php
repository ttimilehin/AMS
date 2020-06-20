<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custodian extends Model
{
    protected $table = 'custodians';
    protected $primarykey = 'id';
    protected $fillable = ['last_name', 'first_name', 'cadre', 'gender', 'address', 'barcode', 'mda', 'unit'];

    public function assets()
    {
        return $this->hasMany(Asset::class, 'user_id', 'id');
    }
}


