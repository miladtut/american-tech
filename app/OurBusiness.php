<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OurBusiness extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['title_ar','title_en','description_ar','description_en','image','link','alt','alt_en'];

    public function services()
    {
        return $this->hasMany('App\BusinessServices', 'business_id' , 'id');
    }

}
