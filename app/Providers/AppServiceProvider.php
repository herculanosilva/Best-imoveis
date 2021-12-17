<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
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
        User::observe(UserObserver::class);

        //https://laravel.com/docs/8.x/controllers#restful-localizing-resource-uris
        // Route::resourceVerbs([
        //     'create' => 'criar',
        //     'edit' => 'editar',
        // ]);
    }
}
