<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class PermissionsServiceProvider extends ServiceProvider
{

    public function boot()
    {
        //
    }

    public function register()
    {
        App::bind('permissions', function()
        {
            return new \App\Classes\Permissions;
        });
    }
}
