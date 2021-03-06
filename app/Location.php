<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'long',
        'lat'
    ];

    public function locationable() {
        return $this->morphTo();
    }

}
