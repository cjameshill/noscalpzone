<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $table = 'sources';

    protected $fillable = [
        'customer_id',
        'data'
    ];

    protected $dates = [
        'updated_at',
        'created_at'
    ];

    protected $casts = [
        'data' => 'array'
    ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
