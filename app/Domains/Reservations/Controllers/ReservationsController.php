<?php

namespace App\Domains\Reservations\Controllers;

use App\Http\Controllers\Controller;

class ReservationsController extends Controller
{
    public function index()
    {
        $disabledDates = '["'. implode('","',[
            '2019-12-12',
            '2019-12-13',
        ]).'"]';

        return view('welcome')->with(compact('disabledDates'));
    }

    public function disabledDates()
    {
        return [
            '2019-12-12',
            '2019-12-13',
        ];
    }
}
