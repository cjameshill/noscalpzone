<section class="header is-fixed">
    <nav class="nav is-background has-transition">
        <div class="nav-left">
            <div class="nav-item">
            </div>
        </div>

        <div class="nav-center nav-main-menu">
           <span class="nav-item">
               <span class="has-dropdown is-sport">
                   <a href="" class="button is-secondary is-medium">Music</a>
                   <div class="main-menu-dropdown">
                       <div class="box">
                           <header>
                               <h1 class="title is-3">Music</h1>
                           </header>
                           <div class="columns is-fullheight is-multiline">
                               <div class="column is-6">
                                   <h1 class="title is-4">Events</h1>
                                    @include('elements._event-item', ['colorTheme' => 'is-sport'])
                                    @include('elements._event-item', ['colorTheme' => 'is-music'])
                                    @include('elements._event-item', ['colorTheme' => 'is-theater'])

                               </div>
                               <div class="column is-6">
                                   <h1 class="title is-4">Performers</h1>
                                   <div class="columns is-multiline">
                                       <div class="column is-3 performer-list-item is-music">
                                           <div class="event-name">
                                            <span>Coldplay</span>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <footer>

                           </footer>
                       </div>
                   </div>
               </span>
           </span>
        </div>

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