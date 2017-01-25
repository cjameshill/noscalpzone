<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{

    protected $guarded = [];

    protected $hidden = [
        'ticket_key'
    ];

    public function ticket() {
        return $this->belongsTo('App\Ticket');
    }
}
