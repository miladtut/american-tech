<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class SystemConstants extends Model
{
    //
      use SoftDeletes;

      protected $fillable = ['name','name_en','create_at','parent_id'];
  
     
      public static function children()
      {
          return self::query()->where('parent_id','!=',0);
      }
      public function getChildren()
      {
          return self::query()->where('parent_id','=',$this->id);
      }
      public  function parent()
      {
          return $this->belongsTo(self::class,'parent_id')->withDefault();
      }
  
}
