<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
		\Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
	];


	protected $middlewareGroups = [
			'web' => [
				\App\Http\Middleware\EncryptCookies::class,
				\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
				//\Illuminate\Session\Middleware\StartSession::class,
				//\Illuminate\View\Middleware\ShareErrorsFromSession::class,
				//\App\Http\Middleware\VerifyCsrfToken::class,
			],
			
			'api' => [
				'throttle:60,1',
			],
		];


	protected $routeMiddleware = [
			'auth' => \App\Http\Middleware\Authenticate::class,
			'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
			'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
			'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
			'admin' => \App\Http\Middleware\RedirectIfNotAdmin::class,
		];
}
