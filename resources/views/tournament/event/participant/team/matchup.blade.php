<table class="table table-hover table-responsive">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Team</th>
            <th scope="col">Score</th>
            <th scope="col">Notes</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr class="table-secondary">
            <td>{{ $event->participant[0]->team->name ?? 'None' }}</td>
            <td>{{ $event->participant[0]->score ?? 'None' }}</td>
            <td>{{ $event->participant[0]->note ?? ' ' }}</td>
            <td>
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-ellipsis-h fa-fw"></i></a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <button data-item="{{ $event->participant[0] ?? null }}" class="dropdown-item editTeamButton">
                            Manage
                        </button>
                    </li>
                    <li>
                        <button data-item="{{ $event->participant[0]->team ?? null }}" class="dropdown-item addAthlete">
                            Add Athlete
                        </button>
                    </li>
                    @isset($event->participant[0])
                        <li>
                            <button data-item="{{ $event->participant[0] ?? null }}"
                                class="dropdown-item text-danger deleteTeamButton">
                                Remove Record
                            </button>
                        </li>
                    @endisset
                </ul>
            </td>
        </tr>
        @if (isset($event->participant[0]))
            @foreach ($event->participant[0]->item as $item)
                <tr>
                    <td colspan="3">{{ $item->athlete->name }}</td>
                    <td colspan="1">
                        <a class="nav-link" id="" role="button"><i class="fas fa-trash fa-fw"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
        <tr class="active" aria-disabled="true">
            <td colspan="4" class="text-center"><b>VS</b></td>
        </tr>
        <tr class="table-secondary">
            <td>{{ $event->participant[1]->team->name ?? 'None' }}</td>
            <td>{{ $event->participant[1]->score ?? 'None' }}</td>
            <td>{{ $event->participant[1]->note ?? ' ' }}</td>
            <td>
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-ellipsis-h fa-fw"></i></a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <button data-item="{{ $event->participant[1] ?? null }}" class="dropdown-item editTeamButton">
                            Manage
                        </button>
                    </li>
                    <li>
                        <button data-item="{{ $event->participant[1] ?? null }}" class="dropdown-item addAthlete">
                            Add Athlete
                        </button>
                    </li>
                    @isset($event->participant[1])
                        <li>
                            <button data-item="{{ $event->participant[1] ?? null }}"
                                class="dropdown-item text-danger deleteTeamButton">
                                Remove Record
                            </button>
                        </li>
                    @endisset
                </ul>
            </td>
        </tr>
        @if (isset($event->participant[1]))
            @foreach ($event->participant[1]->item as $item)
                <tr>
                    <td colspan="3">{{ $item->athlete->name }}</td>
                    <td colspan="1">
                        <a class="nav-link" id="" role="button"><i class="fas fa-trash fa-fw"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
