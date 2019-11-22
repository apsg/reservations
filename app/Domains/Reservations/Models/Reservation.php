<?php
namespace App\Domains\Reservations\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStates\HasStates;

/**
 * Class Reservation
 * @package App\Domains\Reservations\Models
 *
 * @property int            id
 * @property int            client_id
 * @property-read Client    client
 * @property int|null       room_id
 * @property-read Room|null room
 * @property int            people
 * @property Carbon         $from
 * @property Carbon         $to
 * @property Carbon         created_at
 * @property Carbon         updated_at
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
        // TODO: Implement registerStates() method.
    }
}
