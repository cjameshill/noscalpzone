<?php

namespace App;

use App\Tickets\Sell;
use App\Traits\BuyerSeller;
use App\Traits\WithProfiles;
use Illuminate\Notifications\Notifiable;
use App\Billing\Billable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use Notifiable, Billable, WithProfiles, BuyerSeller;

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
        return $this->hasOne(Customer::class);
    }

    public function selling() {
        return $this->hasMany(Ticket::class, 'seller_id');
    }

    public function buying() {
        return $this->hasMany(Ticket::class, 'buyer_id');
    }

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function location() {
        return $this->morphMany(Location::class, 'locationable');
    }

    public function social() {
        return $this->morphMany(Social::class, 'sociable');
    }

    public function tags() {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function profile() {
        return $this->morphMany('App\Profile', 'profileable');
    }

    public function phone() {
        return $this->morphMany(Phone::class, 'phonable');
    }

    public function hasRole($role) {

        if(is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return !! $role->intersect($this->roles)->count();

    }

    public function hasPermissions() {
        foreach ($this->roles as $r){
            foreach($r->permissions as $p){
                return $p->title;
            }
        }
    }

    public function sell() {
        return new Sell($this);
    }

}
