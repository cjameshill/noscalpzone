<?php

namespace App;

use App\Traits\WithProfiles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Performer extends Model
{
    use SoftDeletes, WithProfiles;

    protected $table = 'performers';

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

    public function venues() {
        return $this->belongsToMany('App\Venue');
    }

    public function social() {
        return $this->morphMany('App\Social', 'sociable');
    }

    public function tags() {
        return $this->morphToMany('App\Tag', 'taggable'); // Many to Many Polymorphic
    }

    public function type() {
        return $this->morphToMany('App\Type', 'typeable'); // Many to Many Polymorphic
    }

    public function profile() {
        return $this->morphMany('App\Profile', 'profileable');
    }

}
