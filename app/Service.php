<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App;
/**
 * Class Service
 *
 * @package App
 * @property string $title
 * @property text $desciption
 * @property string $image
*/
class Service extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'desciption', 'image' , 'image_thumbnail','short_text' , 'slug' ,
        'title_en' , 'title_tr' , 'desciption_tr' ,'isShow', 'desciption_en' , 'short_text_en' , 'short_text_tr','alt','alt_en','alt_file_thumbnail','alt_file_thumbnail_en'];
    protected $hidden = [];

    public function business()
    {
        return $this->hasMany('App\BusinessServices', 'service_id' , 'id');
    }
    public function images()
    {
        return $this->hasMany(Serviceimage::class, 'service_id' , 'id');
    }

    public function firstImages($id)
    {
        return Serviceimage::orderBy('service_id','desc')->where('service_id',$id)->first();
    }


    public function getTitleAttribute($input)
    {


        if(App::isLocale('en')){


            if($this->attributes['title_en'] == '')  {
                return $this->attributes['title'];
            }else{
                return  $this->attributes['title_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['title_tr'] == '')  {
                return $this->attributes['title'];
            }else{
                return  $this->attributes['title_tr'];
            }
        }


        return  $this->attributes['title'];

    }


    public function getDesciptionAttribute($input)
    {


        if(App::isLocale('en')){


            if($this->attributes['desciption_en'] == '')  {
                return $this->attributes['desciption'];
            }else{
                return  $this->attributes['desciption_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['desciption_tr'] == '')  {
                return $this->attributes['desciption'];
            }else{
                return  $this->attributes['desciption_tr'];
            }
        }


        return  $this->attributes['desciption'];

    }


    public function getShortTextAttribute($input)
    {


        if(App::isLocale('en')){


            if($this->attributes['short_text_en'] == '')  {
                return $this->attributes['short_text'];
            }else{
                return  $this->attributes['short_text_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['short_text_tr'] == '')  {
                return $this->attributes['short_text'];
            }else{
                return  $this->attributes['short_text_tr'];
            }
        }


        return  $this->attributes['short_text'];

    }
}
