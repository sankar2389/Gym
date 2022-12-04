<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PublisherImage extends Model
{
	protected $table = 'publisher_image';
	protected $fillable = ['pub_id', 'image'];
}
