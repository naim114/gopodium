<ul class="nav nav-tabs mb-4">
    <li class="nav-item">
        <a class="nav-link {{ is_current_route_name('tournament.team.manage') ? 'active' : '' }}"
            href="{{ route('tournament.team.manage') }}">
            Manage
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ is_current_route_name('tournament.team.athlete') ? 'active' : '' }}"
            href="{{ route('tournament.team.athlete') }}">Athletes</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="">Events</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="">Result</a>
    </li>
</ul>
