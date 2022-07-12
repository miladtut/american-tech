<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponseOffers extends Model
{
    //
    public Function getUser(){
        return $this->hasOne('App\User','id','user_id');

    }
}
