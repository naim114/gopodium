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
                <li class="dropdown"><a href="#"><span>Help</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('main.help.faq') }}">{{ trans('app.main.help.faq') }}</a></li>
                        <li><a href="{{ route('main.help.manual') }}">{{ trans('app.main.help.manual') }}</a></li>
                        <li><a href="#">{{ trans('app.main.help.credit') }}</a></li>
                        <li><a href="{{ trans('app.privacy-policy') }}">Policies</a></li>
                        <li><a href="{{ trans('app.terms-conditions') }}">Terms & Conditions</a></li>
                    </ul>
                </li>
                <li><a class="nav-link {{ is_current_route_name('main.contact') ? 'active' : '' }}"
                        href="{{ route('main.contact') }}">Contact</a></li>
                <li><a class="getstarted" href="{{ route('dashboard') }}">
                        @if (null !== Auth::user())
                            Account
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
