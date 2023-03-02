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

        <table class="table table-striped table-hover table-responsive">
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
                    <tr data-toggle="collapse" data-target="{{ '#demo' . $count }}" class="align-middle accordion-toggle">
                        <th scope="row">{{ $count }}</th>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->first_place ?? '0' }}</td>
                        <td>{{ $team->second_place ?? '0' }}</td>
                        <td>{{ $team->third_place ?? '0' }}</td>
                        <td>0.0</td>
                    </tr>
                    <tr>
                        <td colspan="6" class="hiddenRow">
                            <div class="accordian-body collapse p-3" id="{{ 'demo' . $count }}">
                                <p><b>Gold Medal (1st Place):</b> {{ $team->first_place ?? '0' }}</p>
                                <p><b>Silver Medal (2nd Place):</b> {{ $team->second_place ?? '0' }}</p>
                                <p><b>Bronze Medal (3rd Place):</b> {{ $team->third_place ?? '0' }}</p>
                                <p><b>4th Place:</b> {{ $team->fourth_place ?? '0' }}</p>
                                <p><b>5th Place:</b> {{ $team->fifth_place ?? '0' }}</p>
                                <p><b>6th Place:</b> {{ $team->sixth_place ?? '0' }}</p>
                                <p><b>7th Place:</b> {{ $team->seventh_place ?? '0' }}</p>
                                <p><b>8th Place:</b> {{ $team->eighth_place ?? '0' }}</p>
                                <p><b>TOTAL POINTS:</b> 0</p>
                            </div>
                        </td>
                    </tr>
                    @php
                        $count++;
                    @endphp
                @endforeach
            </tbody>
        </table>
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
