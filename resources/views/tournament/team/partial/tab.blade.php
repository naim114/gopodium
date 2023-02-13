<ul class="nav nav-tabs mb-4">
    <li class="nav-item">
        <a class="nav-link {{ is_current_route_name('tournament.team.manage') ? 'active' : '' }}"
            href="{{ route('tournament.team.manage', ['tournament_id' => $tourney->id, 'team_id' => $team->id]) }}">
            Manage
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ is_current_route_name('tournament.team.athletes') || is_current_route_name('tournament.team.athlete') ? 'active' : '' }}"
            href="{{ route('tournament.team.athletes') }}">Athletes</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ is_current_route_name('tournament.team.event') ? 'active' : '' }}"
            href="{{ route('tournament.team.event') }}">Events</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ is_current_route_name('tournament.team.schedule') ? 'active' : '' }}"
            href="{{ route('tournament.team.schedule') }}">Schedule</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ is_current_route_name('tournament.team.result') ? 'active' : '' }}"
            href="{{ route('tournament.team.result') }}">Result</a>
    </li>
</ul>
