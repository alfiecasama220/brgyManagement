<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        // Auth::provider('admins', function ($app, array $config) {
        //     return new \Illuminate\Auth\EloquentUserProvider($app['hash'], $config['model']);
        // });

        // View::composer('*', function ($view) {
        //     if(Session::has('success')) {
        //         $view->with('successMessage', Session::get('success'));
        //     }
        // });
    }
}
