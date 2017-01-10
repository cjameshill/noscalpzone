<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    public function users() {
        return $this->morphedByMany('App\User', 'taggable');
    }

    public function venues() {
        return $this->morphedByMany('App\Venue', 'taggable');
    }

    public function performers() {
        return $this->morphedByMany('App\Performer', 'taggable');
    }

    public function events() {
        return $this->morphedByMany('App\Event', 'taggable');
    }

    public function tickets() {
        return $this->morphedByMany('App\Ticket', 'taggable');
    }

}
