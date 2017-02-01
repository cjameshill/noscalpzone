<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function show(User $user) {
        return $user->customer;
    }

    public function source(User $user) {
        return $user->customer->source->data[0];
    }
    
}
