<?php

namespace App\Tickets;

use App\Event;
use App\Set;
use App\Ticket;

class TicketGrouping
{

    public function addToNewSet($tickets) {

        $set = Set::create();

        $tickets->map(function($t) use($set){
            $t->set()->associate($set);
            $t->save();
        });

    }

}