<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReassignedAsset extends Model
{
    protected $table = 'reassignedasset';
    protected $primarykey = 'id';
    protected $fillable = ['asset_id', 'itemNo', 'description', 'former_custodian', 'present_custodian'];
}
