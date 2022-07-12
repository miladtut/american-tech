<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Statistics extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['title_ar','title_en','number','image','alt','alt_en'];

    
}
