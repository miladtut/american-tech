<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contact
 *
 * @package App
 * @property string $company
 * @property string $first_name
 * @property string $last_name
 * @property string $phone1
 * @property string $phone2
 * @property string $email
 * @property string $skype
 * @property string $address
*/
class Category extends Model
{
    protected $fillable = ['name'];

    protected $table = 'category' ;
    
    public $timestamps = false ;


    public function news()
    {
        return $this->hasMany(News::class, 'category_id', 'id')->orderBy('id' ,'desc');
    }

    
}
