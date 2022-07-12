<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    //

    protected $fillable = ['description_ar', 'description_en','image','title','title_en','alt','alt_en'];
}
