<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
	//public $timestamps = false;
	protected $table = 'ads';
	protected $fillable = [
        'title', 'slug', 'description', 'tags',  'deal_price', 'offer_start_date', 'offer_end_date', 'user_id', 'status'
    ];
}
