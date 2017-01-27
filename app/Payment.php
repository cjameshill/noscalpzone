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
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function seller() {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function ticket() {
        return $this->hasOne(Ticket::class);
    }


}
