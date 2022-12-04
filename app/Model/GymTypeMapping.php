<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GymTypeMapping extends Model
{
	protected $primaryKey = 'type_map_id';
        protected $table = 'gym_type_mapping';
	//protected $fillable = ['cat_name'];
        protected $fillable = ['type_map_id','type_id','user_id','active'];
        public $timestamps = false;
}
