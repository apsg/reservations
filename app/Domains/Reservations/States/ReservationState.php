<?php
namespace App\Domains\Reservations\States;

use App\Domains\Reservations\Models\Reservation;

abstract class ReservationState
{
    /** @var Reservation */
    protected $reservation;

    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    public function mustBePaid() : bool
    {
        return false;
    }
}
