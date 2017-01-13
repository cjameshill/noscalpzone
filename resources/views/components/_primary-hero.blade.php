<section class="hero hero-primary is-large is-background" style="background-image: url({{ $background }});">
    <div class="hero-body">
        <div class="container">
            @if(! empty($title))
                <h1 class="title is-1">
                    {{ $title }}
                </h1>
            @else
                <h1 class="title is-1">
                    "I'd like to pay 18% to sell my ticket."
                </h1>
                <h1 class="subtitle is-3 text-right">
                    - said nobody, ever.
                </h1>
                <h1 class="subtitle is-4">
                    @if(Auth::check()), {{ Auth::user()->name }} @endif
                </h1>
            @endif
        </div>
    </div>
</section>