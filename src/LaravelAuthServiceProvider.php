<?php

namespace InChetanThumar\LaravelAuth;

use Illuminate\Support\ServiceProvider;
use InChetanThumar\LaravelAuth\auth\LaravelAuthUserProvider;

class LaravelAuthServiceProvider extends ServiceProvider {
    
    protected $defer = false;
    
    public function boot()
    {
        //load view location
        $this->loadViewsFrom(__DIR__.'/views', 'laravel-auth');

        // Custom service user provider to override default provider
        \Auth::provider('laravel-auth-user-provider', function($app, array $config) {
            return new LaravelAuthUserProvider($app['hash'], $config['model']);
        });

        //public configuration file
        $this->publishes([
            __DIR__.'/config/laravel-auth.php' => config_path('laravel-auth.php'),
        ]);

        //publish assets
        $this->publishes([
            __DIR__.'/public/' => public_path('vendor/laravel-auth/'),
        ], 'public');

        //publish views
        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/laravel-auth'),
        ]);

    }
    
    public function register()
    {
        
    }
}
