<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gym_package_price extends Model
{
	protected $primaryKey = 'pak_price_id';
        protected $table = 'gym_package_price';
	//protected $fillable = ['cat_name'];
        protected $fillable = ['pak_id','pack_desc','tra_id','dur_id','price'];
        public $timestamps = false;
}
