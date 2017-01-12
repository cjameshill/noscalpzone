<section class="header is-fixed">
    <nav class="nav is-background has-transition">
        <div class="nav-left">
            <div class="nav-item">
            </div>
        </div>

        <div class="nav-center nav-main-menu">
            <span class="nav-item">
                <a href="" class="button is-medium has-transition">Music</a>
                <a href="" class="button is-medium has-transition">Sport</a>
                <a href="" class="button is-medium has-transition">Broadway</a>
                <p class="control">
                    <input type="text" class="input search search-main-menu has-transition" placeholder="Find your next event">
                </p>
            </span>
        </div>

        <div class="nav-right nav-menu">
            <span class="nav-item">
                @if(! Auth::check())
                    <a href="/login" class="button is-medium has-transition">Login</a>
                    <a href="/register" class="button is-medium has-transition is-primary">Sign Up</a>
                @else
                    <a href="/dashboard" class="button is-medium has-transition is-primary">Dashboard</a>
                    <a href="/logout" class="button is-medium has-transition">Logout</a>
                @endif
            </span>
        </div>
    </nav>
</section>