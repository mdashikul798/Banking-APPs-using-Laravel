<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $fillable = [
        'message'  ];
    public function users(){
        return $this->belongsToMany('App\User', 'notification_user', 'user_id', 'notification_id','status')->withPivot('user_id', 'notification_id', 'status')->withTimestamps();

    }


}
