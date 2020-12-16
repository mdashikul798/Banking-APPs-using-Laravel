<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackFile extends Model
{
    protected $fillable = [
        'trackcode', 'path', 'message'
    ];
}
