<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class MailingList extends Model
{
    //
    public function msg(){
        return $this->hasMany('App\ResponseMailingList','mailList_id','id');
    }


}
