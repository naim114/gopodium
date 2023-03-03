@extends('layouts.dashboard-master')

@section('page-title', trans('app.tourney.standing'))

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('tournament', ['id' => $tourney->id]) }}">{{ $tourney->code }}</a> /
    <a>{{ trans('app.tourney.standing') }}</a>
@stop

@section('custom-head')
    <style>
        .hiddenRow {
            padding: 0 !important;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        @include('tournament.partial.tab')

        <table class="table table-striped table-hover table-responsive mb-4">
            <thead class="thead-dark">
                <tr class="align-middle">
                    <th scope="col">#</th>
                    <th scope="col">Team Name</th>
                    <th scope="col">Gold</th>
                    <th scope="col">Silver</th>
                    <th scope="col">Bronze</th>
                    <th scope="col">Total Point</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 1;
                @endphp
                @foreach ($teams as $team)
                    <tr>
                    <tr data-toggle="collapse" data-target="{{ '#demo' . $count }}" class="align-middle accordion-toggle">
                        <th scope="row">
                            <img height="30px" src="{{ asset($team->logo_path ?? 'assets/img/default-team.png') }}" />
                        </th>
                        <td>
                            <b> {{ $team->name }}</b>
                        </td>
                        <td>{{ $team->first_place ?? '0' }}</td>
                        <td>{{ $team->second_place ?? '0' }}</td>
                        <td>{{ $team->third_place ?? '0' }}</td>
                        <td>
                            @if ($tourney->standing_type_id == 1)
                                {{ ($team->first_place ?? '0') * $tourney->first_place_point + ($team->second_place ?? '0') * $tourney->second_place_point + ($team->third_place ?? '0') * $tourney->third_place_point + ($team->fourth_place ?? '0') * $tourney->fourth_place_point + ($team->fifth_place ?? '0') * $tourney->fifth_place_point + ($team->sixth_place ?? '0') * $tourney->sixth_place_point + ($team->seventh_place ?? '0') * $tourney->seventh_place_point + ($team->eighth_place ?? '0') * $tourney->eighth_place_point }}
                            @elseif ($tourney->standing_type_id == 2)
                                {{ ($team->first_place ?? '0') * $tourney->first_place_point + ($team->second_place ?? '0') * $tourney->second_place_point + ($team->third_place ?? '0') * $tourney->third_place_point }}
                            @elseif ($tourney->standing_type_id == 3)
                                {{ ($team->first_place ?? '0') * $tourney->first_place_point }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="hiddenRow">
                            <div class="accordian-body collapse p-3" id="{{ 'demo' . $count }}">
                                @if ($tourney->standing_type_id == 1)
                                    <p><b>Gold Medal (1st Place):</b>
                                        {{ ($team->first_place ?? '0') . ' x ' . $tourney->first_place_point . ' points = ' . ($team->first_place ?? '0') * $tourney->first_place_point }}
                                    </p>
                                    <p><b>Silver Medal (2nd Place):</b>
                                        {{ ($team->second_place ?? '0') . ' x ' . $tourney->second_place_point . ' points = ' . ($team->second_place ?? '0') * $tourney->second_place_point }}
                                    </p>
                                    <p><b>Bronze Medal (3rd Place):</b>
                                        {{ ($team->third_place ?? '0') . ' x ' . $tourney->third_place_point . ' points = ' . ($team->third_place ?? '0') * $tourney->third_place_point }}
                                    </p>
                                    <p><b>4th Place:</b>
                                        {{ ($team->fourth_place ?? '0') . ' x ' . $tourney->fourth_place_point . ' points = ' . ($team->fourth_place ?? '0') * $tourney->fourth_place_point }}
                                    </p>
                                    <p><b>5th Place:</b>
                                        {{ ($team->fifth_place ?? '0') . ' x ' . $tourney->fifth_place_point . ' points = ' . ($team->fifth_place ?? '0') * $tourney->fifth_place_point }}
                                    </p>
                                    <p><b>6th Place:</b>
                                        {{ ($team->sixth_place ?? '0') . ' x ' . $tourney->sixth_place_point . ' points = ' . ($team->sixth_place ?? '0') * $tourney->sixth_place_point }}
                                    </p>
                                    <p><b>7th Place:</b>
                                        {{ ($team->seventh_place ?? '0') . ' x ' . $tourney->seventh_place_point . ' points = ' . ($team->seventh_place ?? '0') * $tourney->seventh_place_point }}
                                    </p>
                                    <p><b>8th Place:</b>
                                        {{ ($team->eighth_place ?? '0') . ' x ' . $tourney->eighth_place_point . ' points = ' . ($team->eighth_place ?? '0') * $tourney->eighth_place_point }}
                                    </p>
                                    <p><b>TOTAL POINTS:</b>
                                        {{ ($team->first_place ?? '0') * $tourney->first_place_point + ($team->second_place ?? '0') * $tourney->second_place_point + ($team->third_place ?? '0') * $tourney->third_place_point + ($team->fourth_place ?? '0') * $tourney->fourth_place_point + ($team->fifth_place ?? '0') * $tourney->fifth_place_point + ($team->sixth_place ?? '0') * $tourney->sixth_place_point + ($team->seventh_place ?? '0') * $tourney->seventh_place_point + ($team->eighth_place ?? '0') * $tourney->eighth_place_point }}
                                    </p>
                                @elseif ($tourney->standing_type_id == 2)
                                    <p><b>Gold Medal (1st Place):</b>
                                        {{ ($team->first_place ?? '0') . ' x ' . $tourney->first_place_point . ' points = ' . ($team->first_place ?? '0') * $tourney->first_place_point }}
                                    </p>
                                    <p><b>Silver Medal (2nd Place):</b>
                                        {{ ($team->second_place ?? '0') . ' x ' . $tourney->second_place_point . ' points = ' . ($team->second_place ?? '0') * $tourney->second_place_point }}
                                    </p>
                                    <p><b>Bronze Medal (3rd Place):</b>
                                        {{ ($team->third_place ?? '0') . ' x ' . $tourney->third_place_point . ' points = ' . ($team->third_place ?? '0') * $tourney->third_place_point }}
                                    </p>
                                    <p><b>TOTAL POINTS:</b>
                                        {{ ($team->first_place ?? '0') * $tourney->first_place_point + ($team->second_place ?? '0') * $tourney->second_place_point + ($team->third_place ?? '0') * $tourney->third_place_point }}
                                    </p>
                                @elseif ($tourney->standing_type_id == 3)
                                    <p><b>Gold Medal (1st Place):</b>
                                        {{ ($team->first_place ?? '0') . ' x ' . $tourney->first_place_point . ' points = ' . ($team->first_place ?? '0') * $tourney->first_place_point }}
                                    </p>
                                    <p><b>TOTAL POINTS:</b>
                                        {{ ($team->first_place ?? '0') * $tourney->first_place_point }}
                                    </p>
                                @endif
                            </div>
                        </td>
                    </tr>
                    </tr>
                    @php
                        $count++;
                    @endphp
                @endforeach
            </tbody>
        </table>

        <div class="card mb-4">
            <div class="card-header">
                <h5>Tournaments Rule</h5>
            </div>
            <div class="card-body">
                <p><b>Standing Rule: </b>{{ $tourney->standing_type->name }}</p>
                <div class="row">
                    <div class="col-md-6">
                        <p><b>Gold Medal Point (1st Place): </b>{{ $tourney->first_place_point }}</p>
                        <p><b>Silver Medal Point (2nd Place): </b>{{ $tourney->second_place_point }}</p>
                        <p><b>Bronze Medal Point (3rd Place): </b>{{ $tourney->third_place_point }}</p>
                        <p><b>4th Place Point: </b>{{ $tourney->fourth_place_point }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><b>5th Place Point: </b>{{ $tourney->fifth_place_point }}</p>
                        <p><b>6th Place Point: </b>{{ $tourney->sixth_place_point }}</p>
                        <p><b>7th Place Point: </b>{{ $tourney->seventh_place_point }}</p>
                        <p><b>8th Place Point: </b>{{ $tourney->eigth_place_point }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
@endsection
