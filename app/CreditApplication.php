<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditApplication extends Model
{
    protected $fillable = [
        'name', 'email','address','phone','country','amount','message'
    ];}
