@if ($event->championship == true && $event->status == 'finished')
    <p style="font-weight: bold; font-style: italic;">This is a championship event. Medal are awarded and points are
        counted accoding to
        tournament settings.</p>
@endif

<table class="table table-striped table-hover table-responsive">
    <thead class="thead-dark">
        <tr class="align-middle">
            <th scope="col">Athlete</th>
            <th scope="col">Team</th>
            <th scope="col">Score</th>
            <th scope="col">Notes</th>
            @if (!isset($action))
                <th scope="col">Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        <tr class="align-middle">
            <td>
                <p>
                    @if ($event->championship == true && $event->status == 'finished')
                        @if ($event->participant[0]->position == 1 && $event->status == 'finished')
                            <img style="height: 25px; width: 25px" src="{{ asset('assets/img/medal_gold.png') }}">
                        @elseif ($event->participant[0]->position == 2)
                            <img style="height: 25px; width: 25px" src="{{ asset('assets/img/medal_silver.png') }}">
                        @elseif ($event->participant[0]->position == 3)
                            <img style="height: 25px; width: 25px" src="{{ asset('assets/img/medal_bronze.png') }}">
                        @elseif ($event->participant[0]->position == null)
                            {{ '' }}
                        @else
                            <b>{{ '(' . $event->participant[0]->position . 'th) ' }}</b>
                        @endif
                    @endif
                    {{ $event->participant[0]->athlete->name ?? 'None' }}
                </p>
            </td>
            <td>{{ $event->participant[0]->athlete->team->name ?? 'None' }}</td>
            <td>{{ $event->participant[0]->score ?? 'None' }}</td>
            <td>{{ $event->participant[0]->note ?? ' ' }}</td>
            @if (!isset($action))
                <td>
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fas fa-ellipsis-h fa-fw"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <button data-item="{{ $event->participant[0] ?? null }}"
                                class="dropdown-item editIndividualButton">
                                Manage
                            </button>
                        </li>
                        @isset($event->participant[0])
                            <li>
                                <button data-item="{{ $event->participant[0] ?? null }}"
                                    class="dropdown-item text-danger deleteIndividualButton">
                                    Remove Record
                                </button>
                            </li>
                        @endisset
                    </ul>
                </td>
            @endif
        </tr>

        <tr class="active" aria-disabled="true">
            <td colspan="5" class="text-center"><b>VS</b></td>
        </tr>

        <tr class="align-middle">
            <td>
                <p>
                    @if ($event->championship == true && $event->status == 'finished')
                        @if ($event->participant[1]->position == 1)
                            <img style="height: 25px; width: 25px" src="{{ asset('assets/img/medal_gold.png') }}">
                        @elseif ($event->participant[1]->position == 2)
                            <img style="height: 25px; width: 25px" src="{{ asset('assets/img/medal_silver.png') }}">
                        @elseif ($event->participant[1]->position == 3)
                            <img style="height: 25px; width: 25px" src="{{ asset('assets/img/medal_bronze.png') }}">
                        @elseif ($event->participant[1]->position == null)
                            {{ '' }}
                        @else
                            <b>{{ '(' . $event->participant[1]->position . 'th) ' }}</b>
                        @endif
                    @endif
                    {{ $event->participant[1]->athlete->name ?? 'None' }}
                </p>
            </td>
            <td>{{ $event->participant[1]->athlete->team->name ?? 'None' }}</td>
            <td>{{ $event->participant[1]->score ?? 'None' }}</td>
            <td>{{ $event->participant[1]->note ?? ' ' }}</td>
            @if (!isset($action))
                <td>
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fas fa-ellipsis-h fa-fw"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <button data-item="{{ $event->participant[1] ?? null }}"
                                class="dropdown-item editIndividualButton">
                                Manage
                            </button>
                        </li>
                        @isset($event->participant[1])
                            <li>
                                <button data-item="{{ $event->participant[1] ?? null }}"
                                    class="dropdown-item text-danger deleteIndividualButton">
                                    Remove Record
                                </button>
                            </li>
                        @endisset
                    </ul>
                </td>
            @endif
        </tr>
    </tbody>
</table>
