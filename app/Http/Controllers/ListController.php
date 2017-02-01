<?php

namespace App\Http\Controllers;

use App\Download;
use App\Event;
use App\User;
use Illuminate\Http\Request;
use App\Set;
use App\Ticket;
use App\Custom\myUUID;

class ListController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Event $event)
    {

        try {
            $set = Set::create();

            $file = request()->session()->get('new-download-' . $event->slug);

            foreach (request()->tickets as $t) {

                $ticket = $this->addNewTicket($event, $set, $t);

                $this->addNewDownload($file, $ticket);
            }

            return response()->json(['status' => 'You have successfully listed your ticket', 'success' => true]);

        } catch (Exception $e) {

            return response()->json(['status' => $e->getMessage(), 'success' => false]);

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reset(Event $event) {

        request()->session()->forget('new-download-'.$event->slug);
        request()->session()->forget('tickets-set-'.$event->slug);
        request()->session()->forget('set');

        return 'success';
    }

    public function upload(Event $event) {
        if(request()->hasFile('file')){

            $download = request()->file('file')->store('tickets', 's3');

            request()->session()->put('new-download-'.$event->slug, $download);

            return $download;
        }
    }

    public function stash(Event $event) {
        $tickets = request()->tickets;
        $ticket = request()->ticket;

        request()->session()->put('tickets-set-'.$event->slug, [$tickets, $ticket]);

    }

    public function resume(Event $event) {
        if(! request()->session()->exists('tickets-set-'.$event->slug)){
            $ticketObjects = null;
        }

        $ticketObjects = request()->session()->get('tickets-set-'.$event->slug);

        if(request()->session()->exists('new-download-'.$event->slug)){
            $downloadObjects = null;
        }

        $downloadObjects = request()->session()->get('new-download-'.$event->slug);


        return collect(['ticketObjects' => $ticketObjects, 'downloadObjects' => $downloadObjects])->toJson();
    }

    protected function addNewTicket($event, $set, $t){

        $user = auth()->user();

        $type = $event->type->first();

        $ticket = Ticket::create([
            'seller_id' => $user->id,
            'set_id' => $set->id,
            'event_id' => $event->id,
            'key' => myUUID::getUUID(),
            'title' => $event->title,
            'is_ga' => request()->ticket['is_ga'],
            'section' => request()->ticket['section'],
            'row' => request()->ticket['row'],
            'seat' => $t['seat'],
            'amount' => request()->ticket['amount'],
            'live' => true
        ]);

        $ticket->addType($type);

        return $ticket;

    }

    protected function addNewDownload($file, $t){
        return Download::create([
            'ticket_id' => $t['id'],
            'ticket_key' => $t['key'],
            'ticket_uri' => basename($file),
        ]);
    }

    protected function getSet(){
        if(! request()->session()->exists('set')){
            $set = Set::create();
            request()->session()->put('set', $set);
        }

        return request()->session()->get('set');
    }
}
