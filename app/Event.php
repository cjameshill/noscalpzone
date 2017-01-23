<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{

    use SoftDeletes;

    protected $table = 'events';

    protected $fillable = [
        'slug',
        'title'
    ];

    protected $dates = [
        'event_start_date',
        'event_end_date',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function tickets() {
        return $this->hasMany('App\Ticket');
    }

    public function setsOfTickets() {
        return Set::whereHas('tickets', function ($q){
            return $q->where('event_id', $this->id);
        })->with('tickets')->get();
    }

    public function performers() {
        return $this->belongsToMany('App\Performer');
    }

    public function venues() {
        return $this->belongsToMany('App\Venue');
    }

    public function social() {
        return $this->morphMany('App\Social', 'sociable');
    }

    public function maps() {
        return $this->morphToMany('App\Map', 'mappable');
    }

    public function tags() {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function type() {
        return $this->morphToMany('App\Type', 'typeable');
    }

    public function profile() {
        return $this->morphMany('App\Profile', 'profileable');
    }




}
