<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded=['_token'];

    public function bills()
    {
        return $this->hasMany('App\Bill');
    }
}
