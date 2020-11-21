<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        "name",
        "price",
        "description",
        "category",
        "postedBy",
        "contact",
        "contactMail",
        "waLink",
        "approvedStatus",  
        
    ];
    
    public function Image()
    {
        return $this->hasMany('App\Image'); 
    }
    public function getImageAttribute()
    { 
        return $this->Image()->latest()->first(); 
    }

    public function Order()
    {
        return $this->hasMany('App\Order'); 
    }
    
}
