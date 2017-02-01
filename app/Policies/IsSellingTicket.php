<?php

namespace App\Policies;

use App\Ticket;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IsSellingTicket
{
    use HandlesAuthorization;

    public function isSelling(Ticket $ticket) {

        return auth()->user()->isSelling($ticket);
    }
}
