<div class="card p-3 mb-3" style="background-color: #f7f7f7">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link {{ is_current_route_name('tournament') ? 'active' : '' }}"
                href="{{ route('tournament') }}">{{ trans('app.tourney.info') }}</a>
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
            <a class="nav-link {{ is_current_route_name('tournament.program') ? 'active' : '' }}"
                href="{{ route('tournament.program') }}">{{ trans('app.tourney.program') }}</a>
        </li>
    </ul>
</div>

@isset($message)
    <div class="alert alert-danger mb-3" role="alert">
        {{ $message }}
    </div>
@endisset
