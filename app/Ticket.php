<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;

    protected $table = 'tickets';

    protected $guarded = [];

    protected $casts = [
        'is_ga' => 'boolean',
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function seller() {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function buyer() {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function payment() {
        return $this->belongsTo(Payment::class);
    }

    public function download() {
        return $this->hasOne(Download::class);
    }

    public function events() {
        return $this->belongsTo(Event::class);
    }

    public function tags() {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function type() {
        return $this->morphToMany(Type::class, 'typeable');
    }

    public function set() {
        return $this->belongsTo(Set::class);
    }



}
