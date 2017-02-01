<?php

namespace App\Billing;


use App\Tickets\Sell;
use App\User;

trait Billable
{


    public static function getUserByStripeId($stripe) {

        return static::whereHas('customer', function ($q) use($stripe) {
            $q->where('stripe_cust_id', $stripe);
        })->firstOrFail();

    }

}