<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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

        Paginator::useBootstrap();
        
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
