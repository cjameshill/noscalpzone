<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $table = 'buyers';

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function payments() {
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
