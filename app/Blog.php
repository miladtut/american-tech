<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    //
    protected $fillable = ['title_ar','title_en','description_ar','description_en','tags_ar','tags_en','department_id'
    ,'isPublished'
    ];

    use SoftDeletes;

    public function images(){
        return $this->hasMany('App\BlogImages','blog_id','id');
    }

    public  function department()
    {
        return $this->hasOne('App\SystemConstants','id','department_id');
    }

    public function firstImages($id)
    {
        return BlogImages::orderBy('blog_id','desc')->where('blog_id',$id)->first();
    }

    public function nextPost($id){
        return $this->where('id','>',$id)->where('isPublished',1)->first();

    }
    public function previousPost($id){
        return $this->orderBy('id','desc')->where('id','<',$id)->where('isPublished',1)->first();

    }

    
}
