@extends('layouts.master')

@section('content')

    <section class="hero hero-primary is-small is-event is-background" style="background-image: url('https://s3.us-east-2.amazonaws.com/noscalpzone-assets/storage/images/msg.jpg');">
        <div class="hero-body">
            <div class="container center-column">
                <h1 class="title is-1">
                    {{ $e->title }}

                </h1>

                <h1 class="subtitle is-2 is-sans-serif">
                    @if($e->venues)
                        @foreach($e->venues as $venue)
                            <span class="icon is-large"><i class="fa fa-map-marker"></i></span>
                            {{ $venue->title }}
                        @endforeach
                    @else
                        TBD
                    @endif

                    {{-- Get social media handel for venue --}}
                </h1>
            </div>
        </div>

        <div class="hero-date">
            <h1 class="subtitle is-2 is-sans-serif is-highlighted">
                        <span class="is-highlighted is-{{ $e->type->first()->name }}">
                             {{ \Carbon\Carbon::parse($e->event_start_date)->toDayDateTimeString()  }}
                        </span>
            </h1>
        </div>

    </section>
    
    <section class="section">

            <event-tickets :event="{{ $e }}"></event-tickets>

    </section>
    
@endsection