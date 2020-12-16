<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userdata extends Model
{
    protected $fillable = [
        'bankcode', 'cashcode', 'swiftcode','currency','amount','previous_balance','servertime','userIP','title1','title2','title3','message1','message2','message3','user_id','code3','code2','code1'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
