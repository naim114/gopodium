<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="{{ route('main') }}">GoPodium</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="{{ asset('main/img/logo.png') }}" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link {{ is_current_route_name('main.home') || is_current_route_name('main') ? 'active' : '' }}"
                        href="{{ route('main.home') }}">Home</a></li>
                <li><a class="nav-link {{ is_current_route_name('main.tourney') ? 'active' : '' }}"
                        href="{{ route('main.tourney') }}">Tournaments</a></li>
                <li><a class="nav-link {{ is_current_route_name('main.help') ? 'active' : '' }}"
                        href="{{ route('main.help') }}">Help</a></li>
                <li><a class="nav-link {{ is_current_route_name('main.contact') ? 'active' : '' }}"
                        href="{{ route('main.contact') }}">Contact</a></li>
                <li><a class="getstarted" href="{{ route('dashboard') }}">
                        @if (null !== Auth::user())
                            My Account
                        @else
                            Log In
                        @endif
                    </a>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
