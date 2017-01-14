<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Performer;
use Illuminate\Support\Facades\Cache;

class MenuController extends Controller
{
    protected $event;

    protected $performer;

    public function __construct(Event $event, Performer $performer) {

        $this->event = $event;

        $this->performer = $performer;

    }

    public function getMenuEvents() {

        ///

    }

    public function eventsAndPerformers($type) {

        $events = $this->event->hasType($type)->orderBy('event_start_date')->take(3)->get();

        $performers = $this->performer->hasType($type)->orderBy('title')->take(6)->get(); // Get some sort of Redis hash for most viewed performers

        return ['events' => $events, 'performers' => $performers];
    }

}
