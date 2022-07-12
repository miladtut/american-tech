<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App;
/**
 * Class Offer
 *
 * @package App
 * @property string $title
 * @property text $text
 * @property string $tags
 * @property string $image
*/
class Offer extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'text', 'tags', 'image' ,'price' , 'typework' , 'workname' ,'typework_tr','typework_en'
      ,  'title_en' , 'title_tr' , 'supervisor_id', 'text_en' ,'text_tr' , 'tags_en' , 'tags_tr' , 'workname_en' ,'workname_tr'];
    protected $hidden = [];


    public function marketer()
    {
        return $this->belongsTo(Marketingteam::class, 'marketer_id' , 'id');
    }

    public function supervisor()
    {
        return $this->belongsTo(Supervisors::class, 'supervisor_id' , 'id');
    }

    public function projectType(){
        return $this->hasOne('App\SystemConstants','id','project_type');
    }


    public function biddingOption(){
        return $this->hasOne('App\SystemConstants','id','biddingOptions');
    }


    
    public function projectStartTime(){
        return $this->hasOne('App\SystemConstants','id','when_start');
    }

    public function connect(){
        return $this->hasOne('App\SystemConstants','id','from_where_connect');
    }

    public function projectedTime(){
        return $this->hasOne('App\SystemConstants','id','time_progress');
    }

    public function msg(){
        return $this->hasMany('App\ResponseOffers','offer_id','id');
    }

}
