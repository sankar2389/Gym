<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News_Model extends Model
{
	//public $timestamps = false;
	protected $table = 'news_list';
	protected $fillable = ['news_title', 'news_slug', 'short_description', 'brief_description',  'small_image', 'orig_image', 'status'];
}
