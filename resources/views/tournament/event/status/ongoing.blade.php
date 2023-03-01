<table class="table table-striped table-hover table-responsive">
    <thead class="thead-dark">
        <tr class="align-middle">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Code</th>
            <th scope="col">Category</th>
            <th scope="col">Round</th>
            <th scope="col">Type</th>
            <th scope="col">Start at</th>
            <th scope="col">End at</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            $count = 1;
        @endphp
        @foreach ($ongoing as $event)
            <tr class="align-middle">
                <th scope="row">{{ $count++ }}</th>
                <td>
                    @if ($event->championship == true && $event->status == 'finished')
                        <b>[Championship]</b>
                    @endif
                    {{ ' ' . $event->name }}
                </td>
                <td>{{ $event->code }}</td>
                <td>{{ $event->category }}</td>
                <td>{{ $event->round }}</td>
                <td>{{ $event->event_type->name }}</td>
                <td>{{ $event->start_at->format('d/m/Y h:i A') }}</td>
                <td>{{ $event->end_at->format('d/m/Y h:i A') }}</td>
                <td>
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fas fa-ellipsis-h fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a href="{{ route('tournament.event.manage', ['tournament_id' => $tourney->id, 'event_id' => $event->id]) }}"
                                class="dropdown-item">
                                Manage
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('tournament.event.settings', ['tournament_id' => $tourney->id, 'event_id' => $event->id]) }}"
                                class="dropdown-item">
                                Settings
                            </a>
                        </li>
                        <li>
                            <button class="dropdown-item text-danger deleteButton" data-item="{{ $event }}">
                                Delete
                            </button>
                        </li>
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
