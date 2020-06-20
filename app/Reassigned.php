<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reassigned extends Model
{
    protected $table = 'reassigneds';
    protected $primarykey = 'id';
    protected $fillable = ['asset_id', 'itemNo', 'description', 'former_custodian', 'present_custodian'];
}
