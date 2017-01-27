<?php

namespace App;

use App\Traits\ModelScopes;
use App\Traits\WithProfiles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Performer extends Model
{
    use SoftDeletes, WithProfiles, ModelScopes, Searchable;

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
        return $this->belongsToMany(Event::class);
    }

    public function venues() {
        return $this->belongsToMany(Venue::class);
    }

    public function social() {
        return $this->morphMany(Social::class, 'sociable');
    }

    public function tags() {
        return $this->morphToMany(Tag::class, 'taggable'); // Many to Many Polymorphic
    }

    public function type() {
        return $this->morphToMany(Type::class, 'typeable'); // Many to Many Polymorphic
    }

    public function profile() {
        return $this->morphMany(Profile::class, 'profileable');
    }

}
