<?php

use App\Http\Middleware\AxiosMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'a',
    'middleware' => AxiosMiddleware::class
], function () {

    Route::get('disabled-dates', 'ReservationsController@disabledDates');

});
