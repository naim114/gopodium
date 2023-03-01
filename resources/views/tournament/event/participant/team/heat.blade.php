                    @if (!isset($action))
                        <button class="btn btn-primary mb-2 addTeamButton">
                            + Add Team
                        </button>
                    @endif

                    @if ($event->championship == true && $event->status == 'finished')
                        <p style="font-weight: bold; font-style: italic;">Medal are awarded and points are counted
                            accoding to
                            tournament settings.</p>
                    @endif
                    <table class="table table-hover table-responsive">
                        <thead class="thead-dark">
                            <tr class="align-middle">
                                <th scope="col">#</th>
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
                                <tr class="table-secondary align-middle">
                                    <th scope="row">
                                        @if ($event->championship == true && $event->status == 'finished')
                                            @if ($count == 1)
                                                <img style="height: 25px; width: 25px"
                                                    src="{{ asset('assets/img/medal_gold.png') }}">
                                                @php
                                                    $count++;
                                                @endphp
                                            @elseif ($count == 2)
                                                <img style="height: 25px; width: 25px"
                                                    src="{{ asset('assets/img/medal_silver.png') }}">
                                                @php
                                                    $count++;
                                                @endphp
                                            @elseif ($count == 3)
                                                <img style="height: 25px; width: 25px"
                                                    src="{{ asset('assets/img/medal_bronze.png') }}">
                                                @php
                                                    $count++;
                                                @endphp
                                            @else
                                                {{ $count++ }}
                                            @endif
                                        @else
                                            {{ $count++ }}
                                        @endif
                                    </th>
                                    <td>{{ $participant->team->name }}</td>
                                    <td>{{ $participant->score ?? 'None' }}</td>
                                    <td>{{ $participant->note ?? '' }}</td>
                                    @if (!isset($action))
                                        <td>
                                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="fas fa-ellipsis-h fa-fw"></i></a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li>
                                                    <button
                                                        data-item="{{ $participant ?? null }}"class="dropdown-item editTeamButton">
                                                        Manage
                                                    </button>
                                                </li>
                                                <li>
                                                    <button data-participant="{{ $participant }}"
                                                        data-item="{{ $participant->team->athlete }}"
                                                        class="dropdown-item addItemButton">
                                                        Add Athlete
                                                    </button>
                                                </li>
                                                <li>
                                                    <button data-item="{{ $participant }}"
                                                        class="dropdown-item text-danger deleteTeamButton">
                                                        Remove Record
                                                    </button>
                                                </li>
                                            </ul>
                                        </td>
                                    @endif
                                </tr>
                                @foreach ($participant->item as $item)
                                    <tr class="align-middle">
                                        <td colspan="1">
                                        </td>
                                        <td colspan="3">{{ $item->athlete->name }}</td>
                                        @if (!isset($action))
                                            <td colspan="1">
                                                <a class="nav-link deleteItemButton" data-item="{{ $item }}"
                                                    role="button"><i class="fas fa-trash fa-fw"></i></a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
