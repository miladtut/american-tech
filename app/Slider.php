<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'subtitle', 'title_en', 'subtitle_en', 'image'];
    protected $hidden = [];
    
    
    
}
