<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        "name",
        "address",
        "phone",
        "email",
        "qty",
        "approval", 
        "product_id", 

    ];

    public function Product()
    {
        return $this->belongsTo('App\Product'); 
    }

    public function Image()
    {
        return $this->hasMany('App\Image'); 
    }
    public function getImageAttribute()
    { 
        return $this->Image()->latest()->first(); 
    }
}
