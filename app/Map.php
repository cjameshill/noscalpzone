<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $fillable = [
        'uri'
    ];

    public function venues() {
        return $this->morphedByMany(Venue::class, 'mappable');
    }

    public function events() {
        return $this->morphedByMany(Event::class, 'mappable');
    }
}
