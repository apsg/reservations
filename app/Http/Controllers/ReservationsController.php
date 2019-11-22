<?php

namespace App\Http\Controllers;

class ReservationsController extends Controller
{
    public function disabledDates()
    {
        return [
            '2019-10-12',
            '2019-10-13',
        ];
    }
}
