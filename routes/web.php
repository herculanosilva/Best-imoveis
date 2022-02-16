<?php

use App\Http\Controllers\Admin\AccessLogController;
use App\Http\Controllers\Admin\ActionLogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\FinalityController;
use App\Http\Controllers\Admin\ImmobileController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;

//Classe auxiliar que ajuda a gerar todas as rotas necessárias para autenticação do usuário.
// Auth::routes([ 'verify' => true ]);

//home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//grupo admin
Route::prefix('admin')->name('admin.')->group( function(){
    //city
    Route::resource('city', CityController::class)
            ->except(['show'])
            ->middleware('verified');
    //type
    Route::resource('type', TypeController::class)
            ->except(['show'])
            ->middleware('verified');
    //finality
    Route::resource('finality', FinalityController::class)
            ->except(['show'])
            ->middleware('verified');
    //Immobile
    Route::resource('immobile', ImmobileController::class)
            ->middleware('verified');
    // Photo #Nested Resources | immobile/1/photo/???
    Route::resource('immobile.photos', PhotoController::class)
            ->except(['show','edit','update'])
            ->middleware('verified');
    //user
    Route::resource('user', UserController::class)
            ->except(['show'])
            ->middleware('verified');
    //profile
    Route::resource('profile', ProfileController::class)
            ->only(['index','update'])
            ->middleware('verified');
    //access logs
    Route::resource('access-log', AccessLogController::class)
            ->middleware('verified');
    //action logs
    Route::resource('action-log', ActionLogController::class)
            ->middleware('verified');

    #Export excel
        //city
        Route::get('cities/export/{search?}', 'App\Http\Controllers\Admin\ExpotsController@CitySpreadsheet')
                ->name('cities.xlsx')
                ->where('search', '.*');
        //type
        Route::get('typies/export/{search?}', 'App\Http\Controllers\Admin\ExpotsController@TypeSpreadsheet')
                ->name('typies.xlsx')
                ->where('search', '.*');;
        //finality
        Route::get('finalities/export/{search?}', 'App\Http\Controllers\Admin\ExpotsController@FinalitySpreadsheet')
                ->name('finalities.xlsx')
                ->where('search', '.*');
        //immobile
        Route::get('immobiles/export/{city_id?}/{title?}', 'App\Http\Controllers\Admin\ExpotsController@ImmobileSpreadsheet')
                ->name('immobiles.xlsx')
                ->where('search', '.*');
        //user
        Route::get('users/export/{search?}', 'App\Http\Controllers\Admin\ExpotsController@UserSpreadsheet')
                ->name('users.xlsx')
                ->where('search', '.*');
        //log access
        Route::get('AccessLog/export/{search?}', 'App\Http\Controllers\Admin\ExpotsController@AccessLogSpreadsheet')
                ->name('access-log.xlsx')
                ->where('search', '.*');
        //log action
        Route::get('ActionsLog/export/{search?}', 'App\Http\Controllers\Admin\ExpotsController@ActionLogSpreadsheet')
                ->name('action-log.xlsx')
                ->where('search', '.*');

    #Export PDF
        //city
        Route::get('cities/exporttopdf/{search?}', 'App\Http\Controllers\Admin\ExpotsController@CityPDF')
                ->name('cities.pdf')
                ->where('search', '.*');
        //type
        Route::get('typies/exporttopdf/{search?}', 'App\Http\Controllers\Admin\ExpotsController@TypePDF')
                ->name('typies.pdf')
                ->where('search', '.*');
        //finality
        Route::get('finalities/exporttopdf/{search?}', 'App\Http\Controllers\Admin\ExpotsController@FinalityPDF')
                ->name('finalities.pdf')
                ->where('search', '.*');
        //immobile
        Route::get('immobiles/exporttopdf/{search?}', 'App\Http\Controllers\Admin\ExpotsController@ImmobilePDF')
                ->name('immobiles.pdf')
                ->where('search', '.*');
        //user
        Route::get('users/exporttopdf/{search?}', 'App\Http\Controllers\Admin\ExpotsController@UserPDF')
                ->name('users.pdf')
                ->where('search', '.*');
        //log access
        Route::get('access/exporttopdf/{search?}', 'App\Http\Controllers\Admin\ExpotsController@AccessLogPDF')
                ->name('access-log.pdf')
                ->where('search', '.*');
        //log action
        Route::get('actions/exporttopdf/{search?}', 'App\Http\Controllers\Admin\ExpotsController@ActionLogPDF')
                ->name('action-log.pdf')
                ->where('search', '.*');
});

// Site
    route::resource('/', App\Http\Controllers\Site\CityController::class)
            ->only('index');
    route::resource('city.immobile', App\Http\Controllers\Site\ImmobileController::class)
            ->only(['index','show']);

Auth::routes(['verify' => true]);
