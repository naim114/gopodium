<div class="card p-3 mb-3" style="background-color: #f7f7f7">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link {{ is_current_route_name('tournament') ? 'active' : '' }}"
                href="{{ route('tournament', ['id' => $tourney->id]) }}">{{ trans('app.tourney.info') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ is_current_route_name('tournament.team') ? 'active' : '' }}"
                href="{{ route('tournament.team') }}">{{ trans('app.tourney.team') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ is_current_route_name('tournament.event') ? 'active' : '' }}"
                href="{{ route('tournament.event') }}">{{ trans('app.tourney.event') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ is_current_route_name('tournament.schedule') ? 'active' : '' }}"
                href="{{ route('tournament.schedule') }}">{{ trans('app.tourney.schedule') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ is_current_route_name('tournament.result') ? 'active' : '' }}"
                href="{{ route('tournament.result') }}">{{ trans('app.tourney.results') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ is_current_route_name('tournament.standing') ? 'active' : '' }}"
                href="{{ route('tournament.standing') }}">{{ trans('app.tourney.standing') }}</a>
        </li>
    </ul>
</div>

@isset($message)
    <div class="alert alert-danger mb-3" role="alert">
        {{ $message }}
    </div>
@endisset
