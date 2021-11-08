<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //https://laravel.com/docs/8.x/controllers#restful-localizing-resource-uris
        Route::resourceVerbs([
            'create' => 'criar',
            'edit' => 'editar',
        ]);
    }
}
