<?php

namespace App\Traits;


use App\Ticket;

trait BuyerSeller
{

    public function isASeller() {
        if($this->selling->count() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function isABuyer() {
        if($this->buying->count() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function isSelling(Ticket $ticket) {

        if($this->selling()->count() > 0){

            return $this->selling()->get()->contains('id', $ticket->id);

        }

        return false;

    }


}