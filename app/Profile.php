<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'avatar',
        'cover_photo',
        'prefered_contact'
    ];

    public function profileable() {
        return $this->morphTo();
    }
}
