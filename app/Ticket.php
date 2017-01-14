<?php

namespace App;

use App\Tickets\TicketDistribution;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Ticket extends Model
{

    use SoftDeletes;

    protected $table = 'tickets';

    protected $fillable = [
        'title',
        'description'
    ];

    protected $hidden = [
        'ticket_key'
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    protected $touches = 'payments';


    public function seller() {
        return $this->belongsTo('App\Seller');
    }

    public function payment() {
        return $this->belongsTo('App\Payment');
    }

    public function downloads() {
        return $this->hasMany('App\Download');
    }

    public function events() {
        return $this->belongsToMany('App\Event');
    }

    public function seats() {
        return $this->hasMany('App\Seat');
    }

    public function tags() {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function type() {
        return $this->morphToMany('App\Type', 'typeable');
    }

    public function distribute() {
        return new TicketDistribution($this);
    }

}
