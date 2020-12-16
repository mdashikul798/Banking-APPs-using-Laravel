<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable = [
        'account_from', 'account_to', 'description','date','bank_address', 'direction', 'amount', 'bank', 'comment','user_id','timer','holderName','codebic','codeiban'

    ];

    public function user()
    {
        return $this->belongsTo('App\User');

    }
}