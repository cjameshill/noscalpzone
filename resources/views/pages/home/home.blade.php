@extends('layouts.master')

@section('content')

    @include('components._primary-hero', ['title' => 'Welcome', 'background' => 'https://s3.us-east-2.amazonaws.com/noscalpzone-assets/storage/images/msg.jpg'])

    <section class="section">
        <div class="columns">
            <div class="column">
                @include('elements._featured-ticket')
            </div>
            <div class="column">
                @include('elements._featured-ticket')
            </div>
            <div class="column">
                @include('elements._featured-ticket')
            </div>
        </div>
    </section>

@endsection