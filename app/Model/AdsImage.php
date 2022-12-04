<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdsImage extends Model
{
	protected $table = 'ads_image';
	protected $fillable = ['ad_id', 'image'];
}
