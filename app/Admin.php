<?php
 
namespace App;
 
use Illuminate\Foundation\Auth\User as Authenticatable;
 
class Admin extends Authenticatable
{
	protected $guard = "admins";
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','active',
    ];
 
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
