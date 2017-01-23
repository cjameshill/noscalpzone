<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    protected $table = 'sets';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function tickets() {
        return $this->hasMany('App\Ticket');
    }

}
