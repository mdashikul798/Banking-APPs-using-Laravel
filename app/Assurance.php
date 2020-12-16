<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assurance extends Model
{
    protected $fillable = [
        'name', 'email', 'dob','credit_apply','id_passport_path','loan_rate','loan_type','rate_type','occupational_activity','proffessional_status','sendcopy'
    ];
}
