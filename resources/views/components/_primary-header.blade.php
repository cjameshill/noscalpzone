<section class="header">

    <nav class="nav {{ $color }}">
        <div class="nav-left">
            <div class="nav-item">
                <a href="/" class="button is-secondary is-medium">#NoScalpZone</a>
            </div>
        </div>

        <center-header></center-header>

        <div class="nav-right nav-menu">
            <span class="nav-item">
                @if(! Auth::check())
                    <a href="/login" class="button is-secondary is-medium">Login</a>
                    <a href="/register" class="button is-medium is-primary">Sign Up</a>
                @else
                    <a href="/dashboard" class="button is-medium is-primary">Dashboard</a>
                    <a href="/logout" class="button is-medium">Logout</a>
                @endif
            </span>
        </div>

    </nav>

</section>