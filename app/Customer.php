<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'stripe_email', 'stripe_cust_id', 'stripe_token'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
