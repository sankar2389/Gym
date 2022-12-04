<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gym_features extends Model
{
	protected $primaryKey = 'fe_id';
        protected $table = 'gym_features';
	//protected $fillable = ['cat_name'];
        protected $fillable = ['fe_id','user_id','features_name','active'];
        public $timestamps = false;
}
