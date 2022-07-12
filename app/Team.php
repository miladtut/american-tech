<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App;
/**
 * Class Book
 *
 * @package App
 * @property string $title
 * @property string $image
 * @property string $path_upload
 * @property string $auther_name
 * @property string $user
 * @property string $name
 * @property string $mobile
 * @property string $email
 * @property enum $type
*/
class Team extends Model
{
    use SoftDeletes;

    protected $table = 'team';
    protected $fillable = ['name', 'image', 'title', 'job'  , 'name_en' , 'name_tr' , 'title_en' , 'title_tr'];


    public function workSystem(){
        return $this->hasOne('App\SystemConstants','id','type_job');
    }






    
}
