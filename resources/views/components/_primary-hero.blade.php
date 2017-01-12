<section class="hero hero-primary is-large is-background" style="background-image: url({{ $background }});">
    <div class="hero-body">
        <div class="container has-text-centered">
            <h1 class="title is-1">
                {{ $title }}@if(Auth::check()), {{ Auth::user()->name }} @endif
            </h1>
        </div>
    </div>
</section>