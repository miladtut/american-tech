<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App;
/**
 * Class News
 *
 * @package App
 * @property string $title
 * @property text $details
 * @property string $user
*/
class News extends Model
{
    use SoftDeletes;


    protected $table = "projects";
    protected $fillable = ['title', 'details', 'short_text' , 'image' , 'tags' , 'tags_en','tags_tr'
    ,'title_tr' , 'title_en' , 'details_en' ,'details_tr' ,
        'short_text_en' , 'short_text_tr' , 'category_id' , 'slug' ,'key_words' , 'hidden_words'];
    
    
    public static function boot()
    {
        parent::boot();

        News::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */

    public function cat()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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


    public function getDetailsAttribute($input)
    {


        if(App::isLocale('en')){


            if($this->attributes['details_en'] == '')  {
                return $this->attributes['details'];
            }else{
                return  $this->attributes['details_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['details_tr'] == '')  {
                return $this->attributes['details'];
            }else{
                return  $this->attributes['details_tr'];
            }
        }


        return  $this->attributes['details'];

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


    public function getTagsAttribute($input)
    {


        if(App::isLocale('en')){


            if($this->attributes['tags_en'] == '')  {
                return $this->attributes['tags'];
            }else{
                return  $this->attributes['tags_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['tags_tr'] == '')  {
                return $this->attributes['tags'];
            }else{
                return  $this->attributes['tags_tr'];
            }
        }


        return  $this->attributes['tags'];

    }
    
}
