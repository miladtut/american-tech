<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponseConsultation extends Model
{
    //
    public Function getUser(){
        return $this->hasOne('App\User','id','user_id');

    }
}
