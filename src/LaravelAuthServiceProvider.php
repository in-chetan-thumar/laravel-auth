<?php

namespace InChetanThumar\LaravelAuth;

use Illuminate\Support\ServiceProvider;

class LaravelAuthServiceProvider extends ServiceProvider {
    
    protected $defer = true;
    
    public function boot()
    {
        // Custom service user provider to override default provider
        \Auth::provider('custom', function($app, array $config) {
            return new CustomUserProvider($app['hash'], $config['model']);
        });

        //public configuration file
        $this->publishes([
            __DIR__.'/config/laravel-auth.php' => config_path('laravel-auth.php'),
        ]);

        //publish assets
        $this->publishes([
            __DIR__.'/public/' => public_path('vendor/laravel-auth/'),
        ], 'public');
    }
    
    public function register()
    {
        
    }
}
