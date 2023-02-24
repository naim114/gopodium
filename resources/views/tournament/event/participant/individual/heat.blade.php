            @if (!isset($action))
                <button class="btn btn-primary mb-2 addIndividualButton">
                    + Add Athlete
                </button>
            @endif

            <table class="table table-striped table-hover table-responsive">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
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
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($participants as $participant)
                        <tr>
                            <th scope="row">{{ $count++ }}</th>
                            <td>{{ $participant->athlete->name ?? 'None' }}</td>
                            <td>{{ $participant->athlete->team->name ?? 'None' }}</td>
                            <td>{{ $participant->score ?? 'None' }}</td>
                            <td>{{ $participant->note ?? '' }}</td>
                            @if (!isset($action))
                                <td>
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                            class="fas fa-ellipsis-h fa-fw"></i></a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li>
                                            <button class="dropdown-item editIndividualButton"
                                                data-item="{{ $participant }}">
                                                Manage
                                            </button>
                                        </li>
                                        <li>
                                            <button class="dropdown-item text-danger deleteIndividualButton"
                                                data-item="{{ $participant }}">
                                                Remove Record
                                            </button>
                                        </li>
                                    </ul>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
