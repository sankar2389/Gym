<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News_mod extends Model
{
	protected $table = 'news_list';
	protected $fillable = ['id','news_title', 'news_slug', 'small_image', 'orig_image', 'short_description', 'brief_description', 'news_date', 'position', 'status','created_at', 'updated_at'];	
}
