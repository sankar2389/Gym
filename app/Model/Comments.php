<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
	protected $table = 'comments';
	protected $fillable = ['pub_id', 'name', 'email', 'comments', 'status'];	
}
