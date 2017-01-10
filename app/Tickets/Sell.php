<?php

namespace App\Tickets;

use App\Seller;
use App\User;

class Sell
{

    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function isSeller() {
        if($this->user->seller){
            return true;
        } else {
            return false;
        }
    }

    public function allSelling() {
        return $this->user->seller->tickets;
    }

    public function isSellingAndGetTicket($ticket) {
        return $this->allSelling()->where('ticket_key', '=', $ticket)->first();
    }

}