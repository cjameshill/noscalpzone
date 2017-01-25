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



}