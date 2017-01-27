<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $guarded = [
        'name', 'title'
    ];

    public function roles() {
        return $this->belongsToMany(Role::class);
    }
}
