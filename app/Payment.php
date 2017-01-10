<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'amount',
        'charge_id',
        'seller_id',
        'buyer_id'
    ];

    protected $touches = 'tickets';

    public function buyer() {
        return $this->belongsTo('App\Buyer');
    }

    public function seller() {
        return $this->belongsTo('App\Seller');
    }

    public function ticket() {
        return $this->hasOne('App\Ticket');
    }


}
