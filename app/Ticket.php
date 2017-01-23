<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;

    protected $table = 'tickets';

    protected $fillable = [
        'title',
        'section',
        'row',
        'seat'
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function seller() {
        return $this->belongsTo('App\Seller');
    }

    public function payment() {
        return $this->belongsTo('App\Payment');
    }

    public function download() {
        return $this->hasOne('App\Download');
    }

    public function events() {
        return $this->belongsTo('App\Event');
    }

    public function tags() {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function type() {
        return $this->morphToMany('App\Type', 'typeable');
    }

    public function set() {
        return $this->belongsTo('App\Set');
    }



}
