<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class SaktiServiceProvider extends ServiceProvider
{

    public function boot()
    {
        //
    }

    public function register()
    {
        App::bind('sakti', function()
        {
            return new \App\Classes\Sakti;
        });
    }
}
