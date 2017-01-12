@extends('layouts.master')

@section('content')

    <section class="hero hero-primary is-fullheight is-background" style="background-image: url('https://s3.us-east-2.amazonaws.com/noscalpzone-assets/storage/images/msg.jpg');">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="columns">
                    <div class="column is-8 is-offset-2-tablet">
                        <h1 class="title is-2">
                            Register
                        </h1>
                        <h1 class="subtitle is-4">
                            and let the magic begin
                        </h1>
                        <form action="/register" method="post" class="form">
                            {{ csrf_field() }}
                            <p class="control">
                                <input type="text" name="name" class="input" placeholder="Your full name" value="{{ old('name') }}"/>
                            </p>
                            <p class="control">
                                <input type="text" name="email" class="input" placeholder="... and your email address, please" value="{{ old('email') }}"/>
                            </p>
                            <p class="control">
                                <input type="password" name="password" class="input" placeholder="Create a password" value="{{ old('password') }}"/>
                            </p>
                            <button class="button is-large is-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection