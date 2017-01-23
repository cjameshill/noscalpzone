<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        return view('pages.home.home');
    }

    public function welcome() {
        return view('pages.home.welcome');
    }
}
