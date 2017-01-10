<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

    protected $guarded = 'name';

    public function events() {
        return $this->morphedByMany('App\Event', 'typeable');
    }

    public function performers() {
        return $this->morphedByMany('App\Performer', 'typeable');
    }

    public function tickets() {
        return $this->morphedByMany('App\Ticket', 'typeable');
    }
}
