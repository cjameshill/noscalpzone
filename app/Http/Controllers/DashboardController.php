<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        $user = auth()->user();

        return view('pages.dashboard.dashboard', compact('user'));
    }
}
