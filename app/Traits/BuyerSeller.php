<?php

namespace App\Traits;


use App\Ticket;

trait BuyerSeller
{

    public function isSeller() {
        if($this->selling->count() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function isBuyer() {
        if($this->buying->count() > 0){
            return true;
        } else {
            return false;
        }
    }


}