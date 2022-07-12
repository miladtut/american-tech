<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\ResetPassword;
use Hash;
use DB;
use Carbon\Carbon;
/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string $remember_token
 * @property enum $type
 * @property string $college
*/
class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['name', 'email', 'password', 'remember_token', 'type', 'role_id', 'college_id'];
    
    public function Marketing(){
     return $this->hasOne('App\Marketingteam','user_id','id');
    }
    public static function boot()
    {
        parent::boot();

        User::observe(new \App\Observers\UserActionsObserver);
    }
    

    public static $enum_type = ["admin" => "Admin", "student" => "Student"];
    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoleIdAttribute($input)
    {
        $this->attributes['role_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCollegeIdAttribute($input)
    {
        $this->attributes['college_id'] = $input ? $input : null;
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    
    public function college()
    {
        return $this->belongsTo(College::class, 'college_id')->withTrashed();
    }
    
    
    

    public function sendPasswordResetNotification( $token)
    {



        //create a new token to be sent to the user.
        DB::table('password_resets')->insert([
            'email' => $this->email,
            'token' => $token, //change 60 to any length you want
            'created_at' => Carbon::now()
        ]);
        $tokenData = DB::table('password_resets')
            ->where('email', $this->email)->orderBy('created_at' , 'desc')->first();




       $this->notify(new ResetPassword($token));
    }



    public function topics() {
        return $this->hasMany(MessengerTopic::class, 'receiver_id');
    }

    public function inbox()
    {
        return $this->hasMany(MessengerTopic::class, 'receiver_id');
    }

    public function outbox()
    {
        return $this->hasMany(MessengerTopic::class, 'sender_id');
    }






}
