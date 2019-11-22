<?php

use App\Domains\Reservations\Controllers\ReservationsController;
use App\Http\Middleware\AxiosMiddleware;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => 'a',
    'middleware' => AxiosMiddleware::class,
], function () {

    Route::get('disabled-dates', ReservationsController::class . '@disabledDates');

});

Route::get('/', ReservationsController::class . '@index');
