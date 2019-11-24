<?php
namespace App\Domains\Reservations\States;

class AcceptedReservationState extends ReservationState
{
    public function mustBePaid() : bool
    {
        return true;
    }
}
