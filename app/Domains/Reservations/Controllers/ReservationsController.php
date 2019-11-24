<?php

namespace App\Domains\Reservations\Controllers;

use App\Domains\Reservations\Requests\CheckReservationDatesRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class ReservationsController extends Controller
{
    public function index()
    {
        $disabledDates = '["' . implode('","', [
                '2019-12-12',
                '2019-12-13',
            ]) . '"]';

        return view('welcome')->with(compact('disabledDates'));
    }

    public function disabledDates()
    {
        return [
            '2019-12-12',
            '2019-12-13',
        ];
    }

    public function check(CheckReservationDatesRequest $request)
    {


        return Response::json([], 200);
    }
}
