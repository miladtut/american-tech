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
class Consultation extends Model
{

    protected $fillable = ['fullname', 'phone', 'email', 'date' , 'datetime' , 'time'];

    protected $table = 'consultation' ;

    public function marketer()
    {
        return $this->belongsTo(Marketingteam::class, 'marketer_id' , 'id');
    }

    
    public function consultationType(){
        return $this->hasOne('App\SystemConstants','id','type');
    }

    public function consultationTime(){
        return $this->hasOne('App\SystemConstants','id','time');
    }
    
    public function attachments(){
        return $this->hasMany('App\ConsultationAttachments','consultation_id','id');
    }

    public  function getStatus()
    {
        return $this->hasOne('App\SystemConstants','id','status');
    }
    
    public function msg(){
        return $this->hasMany('App\ResponseConsultation','consultation_id','id');
    }



    
}
