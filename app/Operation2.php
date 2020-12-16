<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation2 extends Model
{
    protected $fillable = [
        'account_from', 'credit', 'debit','date', 'comment','user_id'

    ];

    public function user()
    {
        return $this->belongsTo('App\User');

    }
}
