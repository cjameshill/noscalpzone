@extends('layouts.master')

@section('content')

    <section class="hero hero-primary is-medium is-background" style="background-image: url('https://s3.us-east-2.amazonaws.com/noscalpzone-assets/storage/images/msg.jpg');">
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-1">
                    {{ $e->title }}

                </h1>

                <h1 class="subtitle is-2 is-sans-serif is-highlighted">
                    <span class="is-highlighted is-{{ $e->type->first()->name }}">
                         {{ \Carbon\Carbon::now()->toDayDateTimeString()  }}
                    </span>
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
                </h1>
            </div>
        </div>
    </section>
    
    <section class="section">

            <event-tickets :event="{{ $e }}"></event-tickets>

    </section>
    
@endsection