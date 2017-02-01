<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'amount',
        'order_id',
        'set_id',
        'tickets',
        'data',
        'charge_id',
        'seller_id',
        'buyer_id'
    ];

    protected $casts = [
        'data' => 'array',
        'tickets' => 'array'
    ];

    public function buyer() {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function seller() {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function ticket() {
        return $this->hasOne(Ticket::class);
    }


}
