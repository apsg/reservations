<?php
namespace App\Domains\Reservations\Models;

use App\Domains\Reservations\States\AcceptedReservationState;
use App\Domains\Reservations\States\PaidReservationState;
use App\Domains\Reservations\States\PendingReservationState;
use App\Domains\Reservations\States\RejectedReservationState;
use App\Domains\Reservations\States\ReservationState;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStates\HasStates;

/**
 * Class Reservation
 * @package App\Domains\Reservations\Models
 *
 * @property int                   id
 * @property int                   client_id
 * @property-read Client           client
 * @property int|null              room_id
 * @property-read Room|null        room
 * @property int                   people
 * @property Carbon                $from
 * @property Carbon                $to
 * @property Carbon                created_at
 * @property Carbon                updated_at
 * @property-read ReservationState state
 */
class Reservation extends Model
{
    use HasStates;

    protected $fillable = [
        'client_id',
        'room_id',
        'people',
        'from',
        'to',
    ];

    protected $dates = [
        'from',
        'to',
    ];

    //
    protected function registerStates() : void
    {
        $this->addState('state', ReservationState::class)
            ->allowTransition(PendingReservationState::class, AcceptedReservationState::class)
            ->allowTransition(PendingReservationState::class, RejectedReservationState::class)
            ->allowTransition(AcceptedReservationState::class, PaidReservationState::class)
            ->default(PendingReservationState::class);
    }
}
