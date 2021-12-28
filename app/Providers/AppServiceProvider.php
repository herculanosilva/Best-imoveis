<?php

namespace App\Providers;

use App\Models\City;
use App\Models\Finality;
use App\Models\Immobile;
use App\Models\Type;
use App\Models\User;
use App\Observers\CityObserver;
use App\Observers\FinalityObserver;
use App\Observers\ImmobileObserver;
use App\Observers\TypeObserver;
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
        Immobile::observe(ImmobileObserver::class);
        City::observe(CityObserver::class);
        Type::observe(TypeObserver::class);
        Finality::observe(FinalityObserver::class);

        //https://laravel.com/docs/8.x/controllers#restful-localizing-resource-uris
        // Route::resourceVerbs([
        //     'create' => 'criar',
        //     'edit' => 'editar',
        // ]);
    }
}
