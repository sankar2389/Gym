<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gym_category extends Model
{
	protected $table = 'gym_category_master';
	protected $fillable = ['cat_name'];
        public $timestamps = false;
}
