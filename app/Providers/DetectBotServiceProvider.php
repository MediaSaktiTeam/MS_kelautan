<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class DetectBotServiceProvider extends ServiceProvider
{

    public function boot()
    {
        //
    }

    public function register()
    {
        App::bind('detectbot', function()
        {
            return new \App\Classes\DetectBot;
        });
    }
}
