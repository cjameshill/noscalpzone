@extends('layouts.master')

@section('content')

    <section class="hero hero-primary is-small is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-1">
                    List your ticket for free
                </h1>
                <h1 class="subtitle is-3 is-sans-serif">
                    Oh yea, and we're only going to charge you a 6% fee, and we'll take care of the rest.
                </h1>
            </div>
        </div>
    </section>

    <section class="section is-min-height">
        <div class="container">
            <div class="columns center-column">
                <div class="column has-text-centered">
                    <h1 class="title is-2">Which event?</h1>
                    <input type="text" class="input is-large is-search" placeholder="Search for Event">
                </div>
                <div class="column has-text-centered">
                    <a href="/sell/Coldplay-at-MSG-January-24-2017" class="button is-large is-primary">Coldplay 2017 Tour</a>
                </div>
            </div>
        </div>
    </section>

@endsection