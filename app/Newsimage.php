<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Newsimage
 *
 * @package App
 * @property string $image
 * @property string $news
*/
class Newsimage extends Model
{
    use SoftDeletes;

    protected $fillable = ['image', 'news_id'];
    
    
    public static function boot()
    {
        parent::boot();

        Newsimage::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setNewsIdAttribute($input)
    {
        $this->attributes['news_id'] = $input ? $input : null;
    }
    
    public function news()
    {
        return $this->belongsTo(News::class, 'news_id')->withTrashed();
    }
    
}
