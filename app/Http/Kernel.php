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
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
        ],
        'api' => [
            'throttle:60,1',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'guestApp' => \App\Http\Middleware\RedirectIfAuthenticatedApp::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'MustLogin' => \App\Http\Middleware\MustLogin::class,
        'Validasi' => \App\Http\Middleware\Validasi::class,
        'Admin' => \App\Http\Middleware\Admin::class,
        'Pembudidaya' => \App\Http\Middleware\Pembudidaya::class,
        'Nelayan' => \App\Http\Middleware\Nelayan::class,
        'Pengolah' => \App\Http\Middleware\Pengolah::class,
        'Blog' => \App\Http\Middleware\Blog::class,
        'Pesisir' => \App\Http\Middleware\Pesisir::class,
        'AdminApp' => \App\Http\Middleware\AdminApp::class,
    ];
}