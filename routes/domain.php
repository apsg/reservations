<?php

use App\Domains\Reservations\Controllers\ReservationsController;
use App\Http\Middleware\AxiosMiddleware;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => 'a',
    'middleware' => AxiosMiddleware::class,
], function () {

    Route::get('disabled-dates', ReservationsController::class . '@disabledDates');
    Route::post('check-dates', ReservationsController::class . '@check');

});

Route::get('/', ReservationsController::class . '@index');
