<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GymBannerAdd extends Model
{
	protected $primaryKey = 'ban_id';
        protected $table = 'gym_banner_master';
	//protected $fillable = ['cat_name'];
        protected $fillable = ['user_id','ban_title','img_path','active'];
        public $timestamps = false;
}
