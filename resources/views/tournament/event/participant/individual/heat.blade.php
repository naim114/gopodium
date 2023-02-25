            @if (!isset($action))
                <button class="btn btn-primary mb-2 addIndividualButton">
                    + Add Athlete
                </button>
            @endif

            @if ($event->championship == true && $event->status == 'finished')
                <p style="font-weight: bold; font-style: italic;">Medal are awarded and points are counted accoding to
                    tournament settings.</p>
            @endif
            <table class="table table-striped
                table-hover table-responsive">
                <thead class="thead-dark">
                    <tr class="align-middle">
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
                        $i = 0;
                        $count = $event->championship == true && $event->status == 'finished' ? 4 : 1;
                    @endphp
                    @foreach ($participants as $participant)
                        <tr class="align-middle">
                            <th scope="row">
                                @if ($event->championship == true && $event->status == 'finished')
                                    @if ($i == 0)
                                        <img style="height: 25px; width: 25px"
                                            src="{{ asset('assets/img/medal_gold.png') }}">
                                    @elseif ($i == 1)
                                        <img style="height: 25px; width: 25px"
                                            src="{{ asset('assets/img/medal_silver.png') }}">
                                    @elseif ($i == 2)
                                        <img style="height: 25px; width: 25px"
                                            src="{{ asset('assets/img/medal_bronze.png') }}">
                                    @else
                                        {{ $count++ }}
                                    @endif
                                @else
                                    {{ $count++ }}
                                @endif
                            </th>
                            <td>
                                {{ $participant->athlete->name ?? 'None' }}
                            </td>
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
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
