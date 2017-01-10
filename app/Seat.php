<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $table = 'seats';

    protected $fillable = [
        'section',
        'number',
        'row'
    ];

    protected $touches = 'tickets';

    public function ticket() {
        return $this->belongsTo('App\Ticket');
    }
}
