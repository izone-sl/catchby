<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slideshowpost extends Model
{
    //
    protected $fillable = [
        "title",
        "AdsPosition",
        "AdsType",
        "ref",
        "avatar",
        "active",
    ];
 
}
