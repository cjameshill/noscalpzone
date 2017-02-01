<?php

namespace App\Http\Controllers;

use App\Custom\myUUID;
use App\Download;
use App\Ticket;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Event;
use App\Set;

class SellController extends Controller
{
    public function __construct() {

        $this->middleware(['role:manager' || 'role:admin']);
    }

    public function index() {
        return view('pages.sell.sell');
    }

    public function event(Event $event){

        $e = $event->with('type', 'venues', 'venues.social')->where('slug', $event->slug)->first();

        return view('pages.sell.sell-event', compact('e'));

    }


}
