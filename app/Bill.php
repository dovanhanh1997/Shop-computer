<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $guarded = ['_token'];
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product','bills_products',
            'bill_id','product_id');
    }
}
