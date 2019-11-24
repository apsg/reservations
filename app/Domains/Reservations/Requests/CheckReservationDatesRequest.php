<?php
namespace App\Domains\Reservations\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckReservationDatesRequest extends FormRequest
{
    public function rules()
    {
        return [
            'from'   => 'required|date|after:today',
            'to'     => 'required|date|after:from',
            'people' => 'required|integer|min:1|max:10',
        ];
    }
}
