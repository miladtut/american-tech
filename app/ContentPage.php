<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class ContentPage extends Model
{
    protected $fillable = ['title', 'title_en', 'page_text', 'page_text_en'];
        
    public static function boot()
    {
        parent::boot();

        ContentPage::observe(new \App\Observers\UserActionsObserver);
    }
    
    public function category_id()
    {
        return $this->belongsToMany(ContentCategory::class, 'content_category_content_page');
    }
    
    public function tag_id()
    {
        return $this->belongsToMany(ContentTag::class, 'content_page_content_tag');
    }


    public function getPageTextAttribute($input)
    {


        if(App::isLocale('en')){


            if($this->attributes['page_text_en'] == '')  {
                return $this->attributes['page_text'];
            }else{
                return  $this->attributes['page_text_en'];
            }

        }elseif(App::isLocale('tr')){
            if($this->attributes['page_text_tr'] == '')  {
                return $this->attributes['page_text_en'];
            }else{
                return  $this->attributes['page_text_tr'];
            }
        }


        return  $this->attributes['page_text'];

    }
    
}
