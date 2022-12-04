<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PublisherOpHours extends Model
{
	protected $table = 'publisher_op_hours';
	protected $fillable = ['pub_id', 'op_days', 'op_hours'];
}
