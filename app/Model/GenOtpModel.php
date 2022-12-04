<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GenOtpModel extends Model
{
     protected $table = 'gym_mobile_otp';
public $timestamps = false;
protected $fillable = [
        'mobile_no', 'otp' 
    ];
}
