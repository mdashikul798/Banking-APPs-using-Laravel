<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','age','address','postalcode','phone','country','account_type','profile_image','account_no','blocked'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function account(){
        return $this->hasOne('App\Userdata');
    }

    public function operations(){
        return $this->hasMany('App\Operation');
    }

    public function operations2(){
        return $this->hasMany('App\Operation2');
    }
    public function notifications(){
        return $this->belongsToMany('App\Notification')->withTimestamps();

    }

    public function usernotifications()
    {
        return $this->hasMany('App\Notification','notification_user','user_id');
    }
  

}
