<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['_token'];
    public function bills()
    {
        return $this->belongsToMany('App\Bill','bills_products',
            'product_id','bill_id');
    }
}
