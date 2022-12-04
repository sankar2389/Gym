<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GymType extends Model
{
	protected $primaryKey = 'type_id';
        protected $table = 'gym_type_master';
	//protected $fillable = ['cat_name'];
        protected $fillable = ['type_id','type_name','active','user_id'];
        public $timestamps = false;
}
