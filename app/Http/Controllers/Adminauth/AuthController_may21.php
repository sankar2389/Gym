<?php

namespace App\Http\Controllers\Adminauth;

use App\Admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/admin/home';
	protected $guard = 'admin';
	
	public function showLoginForm()
	{
		if (Auth::guard('admin')->check())
		{
			return redirect('/admin/home');
		}
		
		 return view('admin.auth.login');
	}
	
	public function showRegistrationForm()
	{
		return view('admin.auth.register');
	}
	
	public function resetPassword()
	{
		return view('admin.auth.passwords.email');
	}
	
	public function logout(){
		Auth::guard('admin')->logout();
		return redirect('/admin/login');
	}
}
