<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessServices extends Model
{
    //
    
    public function busines()
    {

        return $this->hasOne('App\OurBusiness', 'id', 'business_id');
    }

    public function service()
    {

        return $this->hasOne('App\Service', 'id', 'service_id');
    }
}
