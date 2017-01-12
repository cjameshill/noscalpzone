<?php

namespace App;

use App\Tickets\Sell;
use App\Traits\WithProfiles;
use Illuminate\Notifications\Notifiable;
use App\Billing\Billable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use Notifiable, Billable, WithProfiles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function customer(){
        return $this->hasOne('App\Customer');
    }

    public function buyer() {
        return $this->hasOne('App\Buyer');
    }

    public function seller() {
        return $this->hasOne('App\Seller');
    }

    public function roles() {
        return $this->belongsToMany('App\Role');
    }

    public function location() {
        return $this->morphMany('App\Location', 'locationable');
    }

    public function social() {
        return $this->morphMany('App\Social', 'sociable');
    }

    public function tags() {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function profile() {
        return $this->morphMany('App\Profile', 'profileable');
    }

    public function phone() {
        return $this->morphMany('App\Phone', 'phonable');
    }


    public function sell() {
        return new Sell($this);
    }

}
