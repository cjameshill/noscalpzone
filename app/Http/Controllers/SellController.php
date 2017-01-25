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

        $this->middleware('auth')->except(['index']);
    }

    public function index() {
        return view('pages.sell.sell');
    }

    public function event(Event $event){

        $e = $event->with('type', 'venues', 'venues.social')->where('slug', $event->slug)->first();

        return view('pages.sell.sell-event', compact('e'));

    }

    public function upload(Request $request, Event $event) {

        // Create Upload Form Validation
        // Check if Session exists

        $user = auth()->user();

        $set = Set::create();

        $ticket = Ticket::create([
            'seller_id' => $user->id,
            'set_id' => $set->id,
            'event_id' => $event->id,
            'key' => myUUID::getUUID(),
            'title' => $event->title
        ]);

        $download = Download::create([
            'ticket_id' => $ticket->id,
            'ticket_key' => $ticket->key,
            'ticket_uri' => $ticket->key.'.pdf',
        ]);

        $ticket->download_id = $download->id;
        $ticket->save();

        $request->session()->put('new-ticket', $ticket);

    }

    public function save(Request $request, Event $event) {

        // Ticket Validation

        $ticket = $request->session()->get('new-ticket');

        $t = Ticket::findOrFail($ticket->id);

        $t->update([
            'section' => $request['section'],
            'row' => $request['row'],
            'seat' => $request['seat'],
            'amount' => $request['amount'],
        ]);

        return $t;
    }

    public function resume(Request $request) {
        if(! $request->session()->exists('new-ticket')){
            return null;
        }

        return $request->session()->get('new-ticket');
    }

}
