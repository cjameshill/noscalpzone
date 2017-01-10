<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{

    protected $table = 'sellers';

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function payment() {
        return $this->hasMany('App\Payment');
    }

    public function tickets() {
        return $this->hasMany('App\Ticket');
    }


    /**
     * Get Stripe Info.
     *
     * @return object
     */

    public function stripe() {
        return $this->user()->first()->customer()->first();
    }
}
