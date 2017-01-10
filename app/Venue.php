<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venue extends Model
{
    use SoftDeletes;

    protected $table = 'venues';

    protected $fillable = [
        'title',
        'slug'
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];


    public function getRouteKeyName() {
        return 'slug';
    }

    public function events() {
        return $this->belongsToMany('App\Event');
    }

    public function performers() {
        return $this->belongsToMany('App\Performer');
    }

    public function location() {
        return $this->morphMany('App\Location', 'locationable');
    }

    public function social() {
        return $this->morphMany('App\Social', 'sociable');
    }

    public function maps() {
        return $this->morphToMany('App\Map', 'mappable'); // Many to Many Polymorphic
    }

    public function tags() {
        return $this->morphToMany('App\Tag', 'taggable'); // Many to Many Polymorphic
    }

    public function profile() {
        return $this->morphMany('App\Profile', 'profileable');
    }

    public function phone() {
        return $this->morphMany('App\Phone', 'phonable');
    }

    public function type() {
        return $this->morphToMany('App\Type', 'typeable'); // Many to Many Polymorphic
    }
}
