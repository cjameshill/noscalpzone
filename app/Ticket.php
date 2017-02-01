<?php

namespace App;

use App\Traits\ModelScopes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes, ModelScopes;

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

    public function getRouteKeyName() {
        return 'key';
    }

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

    public function withSetsOfTickets() {
        return Set::whereHas('tickets', function ($q){
            return $q->where('id', $this->id);
        })->with('tickets', 'tickets.type')->get();
    }

    public function withSetsOfTicketsWithDownloads() {
        return Set::whereHas('tickets', function ($q){
            return $q->where('id', $this->id);
        })->with('tickets', 'tickets.download');
    }


}
