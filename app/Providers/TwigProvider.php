<?php

namespace App\Providers;

use App\Lib\Twig\Render;
use Illuminate\Support\ServiceProvider;

class TwigProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Render::class, function ($app) {
            return new Render();
        });
    }
}
