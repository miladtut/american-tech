<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuildProject extends Model
{
    //
    protected $fillable = ['title', 'title_en', 'description','description_en', 'image','alt','alt_en'];

}
