<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    //
    protected $fillable = [
        "img"
    ];
    // protected $guarded = ['id'];

    public function Product()
    {
        return $this->belongsTo('App\Product'); 
    }
}
