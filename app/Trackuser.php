<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
class Trackuser extends Authenticatable
{
 
  public function trackme(){

        return $this->belongsTo(User::class,'who_user');

    }
  public function user(){

        return $this->belongsTo(User::class);

    }

}
