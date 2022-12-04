<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
	protected $table = 'publisher';
	protected $fillable = [
        'title', 'category', 'subcategory', 'subsubcategory', 'description', 'tags',  'video',  'city', 'address', 'op_hours', 'phone', 'email', 'user_id', 'website', 'twitter', 'facebook', 'status'
    ];
}
