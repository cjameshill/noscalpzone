<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = [
        'social_type',
        'handle'
    ];

    public function sociable() {
        return $this->morphTo();
    }

    // Social

    public function twitterHandle() {
        return $this->where('social_type', 'twitter')->first()->handle;
    }
}
