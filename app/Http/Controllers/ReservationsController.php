<?php

namespace App\Http\Controllers;

class ReservationsController extends Controller
{
    public function disabledDates()
    {
        return [
            '2019-12-12',
            '2019-12-13',
        ];
    }
}
