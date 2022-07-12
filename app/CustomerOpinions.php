<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CustomerOpinions extends Model
{
     use SoftDeletes;
     protected $fillable = ['name_ar','name_en','description_ar','description_en','specialization_ar','specialization_en','image','alt','alt_en'];

     
    }
