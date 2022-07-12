<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Medium
 *
 * @package App
 * @property string $title
 * @property enum $type
*/
class Medium extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'type' ,'file' , 'url'];
    protected $hidden = [];
    
    

    public static $enum_type = [ "video" => "Video", "image" => "Image"];
    
}
