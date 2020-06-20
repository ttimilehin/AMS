<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $table = 'assets';
    protected $primarykey = 'id';
    protected $fillable = ['itemNo', 'description', 'more_description', 'date_purchased', 'date_capitalised', 'quantity', 'purchase_cost', 'life_in_years', 'depreciation_percentage',
    'maintenance', 'asset_value', 'category', 'status', 'barcode', 'account_code', 'mda', 'location', 'custodian_id', 'office' ];

    public function custodian()
    {
        return $this->hasone(Custodian::class, 'first_name', 'id');
    }

    public function custod()
    {
        return $this->belongsTo(Custodian::class, 'first_name');
    }

    public function dispose()
    {
        return $this->hasOne(Dispose::class, 'asset_id', 'id');
    }
}
