<nav class="mb-4">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-link {{ is_current_route_name('tournament.event.manage') ? 'active' : '' }}"
            href="{{ route('tournament.event.manage', ['tournament_id' => $tourney->id, 'event_id' => $event->id]) }}">Manage</a>
        <a class="nav-link {{ is_current_route_name('tournament.event.settings') ? 'active' : '' }}"
            href="{{ route('tournament.event.settings', ['tournament_id' => $tourney->id, 'event_id' => $event->id]) }}">Setting</a>
    </div>
</nav>
