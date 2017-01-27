<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

    protected $guarded = 'name';

    public function events() {
        return $this->morphedByMany(Event::class, 'typeable');
    }

    public function performers() {
        return $this->morphedByMany(Performer::class, 'typeable');
    }

    public function tickets() {
        return $this->morphedByMany(Ticket::class, 'typeable');
    }
}
