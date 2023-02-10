<div class="d-flex flex-row">
    <img id="preview" class="img-thumbnail" style="height: 150px; width: 150px"
        src="{{ asset('assets/img/default-trophy.jpg') }}">
    <div class="col" style="margin-left: 20px">
        <h1>TOURNAMENT NAME HERE</h1>
        <p><b>
                Tournament Code Here<br>
                {{ '10/10/10' }} - {{ '10/10/10' }}<br>
                Organize by {{ 'Organizer' }}<br>
            </b></p>
    </div>
</div>

<div class="card p-3 mt-3 mb-3" style="background-color: #f7f7f7">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link {{ is_current_route_name('main.tourney.event') ? 'active' : '' }}"
                href="{{ route('main.tourney.event') }}">{{ trans('app.tourney.event') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ is_current_route_name('main.tourney.standing') ? 'active' : '' }}"
                href="{{ route('main.tourney.standing') }}">{{ trans('app.tourney.standing') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ is_current_route_name('main.tourney.schedule') ? 'active' : '' }}"
                href="{{ route('main.tourney.schedule') }}">{{ trans('app.tourney.schedule') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ is_current_route_name('main.tourney.result') ? 'active' : '' }}"
                href="{{ route('main.tourney.result') }}">{{ trans('app.tourney.results') }}</a>
        </li>
    </ul>
</div>
