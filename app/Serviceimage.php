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
class Serviceimage extends Model
{

   // use SoftDeletes;

    public $timestamps = false ;


    protected $table = 'services_images' ;


}
