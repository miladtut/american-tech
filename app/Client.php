<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client
 *
 * @package App
 * @property string $name
 * @property string $image
*/
class Client extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','name_en', 'image','alt','alt_en'];
    protected $hidden = [];
    
    
    
}
