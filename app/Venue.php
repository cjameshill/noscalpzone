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
        return $this->belongsToMany(Event::class);
    }

    public function performers() {
        return $this->belongsToMany(Performer::class);
    }

    public function location() {
        return $this->morphMany(Location::class, 'locationable');
    }

    public function social() {
        return $this->morphMany(Social::class, 'sociable');
    }

    public function maps() {
        return $this->morphToMany(Map::class, 'mappable'); // Many to Many Polymorphic
    }

    public function tags() {
        return $this->morphToMany(Tag::class, 'taggable'); // Many to Many Polymorphic
    }

    public function profile() {
        return $this->morphMany(Profile::class, 'profileable');
    }

    public function phone() {
        return $this->morphMany(Phone::class, 'phonable');
    }

    public function type() {
        return $this->morphToMany(Type::class, 'typeable'); // Many to Many Polymorphic
    }
}
