<?php

namespace App;

use App\Traits\ModelScopes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{

    use SoftDeletes, ModelScopes;

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
        return $this->hasMany(Ticket::class);
    }

    public function setsOfTickets() {
        return Set::whereHas('tickets', function ($q){
            return $q->where('event_id', $this->id);
        });
    }

    public function performers() {
        return $this->belongsToMany(Performer::class);
    }

    public function venues() {
        return $this->belongsToMany(Venue::class);
    }

    public function social() {
        return $this->morphMany(Social::class, 'sociable');
    }

    public function maps() {
        return $this->morphToMany(Map::class, 'mappable');
    }

    public function tags() {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function type() {
        return $this->morphToMany(Type::class, 'typeable');
    }

    public function profile() {
        return $this->morphMany(Profile::class, 'profileable');
    }




}
