<?php

namespace VarenykyECom\Support;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }   

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../../routes/blogs.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'VarenykyECom');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'VarenykyECom');
    }
}
