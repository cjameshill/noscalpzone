<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    public function users() {
        return $this->morphedByMany(User::class, 'taggable');
    }

    public function venues() {
        return $this->morphedByMany(Venue::class, 'taggable');
    }

    public function performers() {
        return $this->morphedByMany(Performer::class, 'taggable');
    }

    public function events() {
        return $this->morphedByMany(Event::class, 'taggable');
    }

    public function tickets() {
        return $this->morphedByMany(Ticket::class, 'taggable');
    }

}
