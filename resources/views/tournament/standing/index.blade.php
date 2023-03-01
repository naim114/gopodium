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

        {{-- TEAM EVENT --}}
        <p class="mt-4"><b>TEAM EVENT</b></p>
        {{-- @foreach ($tourney->team as $team)
            <p class="mt-4"><b>{{ $team->name }}</b></p>
            @foreach ($team->participant as $participant)
                @if (calculate_status($participant) == 'finished')
                    @if (isset($participant->position))
                        <p>{{ $participant->event->name . ' place: ' . $participant->position }}</p>
                    @else
                        <p>{{ $participant->event->name }}</p>
                    @endif
                @endif
            @endforeach
        @endforeach --}}
        @foreach ($positions as $pos)
            <p>{{ json_encode($pos) }}</p>
        @endforeach

        {{-- IND EVENT --}}
        <p class="mt-4"><b>IND EVENT</b></p>


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
                {{-- TODO foreach here --}}
                <tr data-toggle="collapse" data-target="#demo1" class="align-middle accordion-toggle">
                    {{-- <th scope="row">{{ $count++ }}</th> --}}
                    <th scope="row">1</th>
                    <td>TEAM 1</td>
                    <td>2</td>
                    <td>5</td>
                    <td>3</td>
                    <td>10.00</td>
                </tr>
                <tr>
                    <td colspan="6" class="hiddenRow">
                        <div class="accordian-body collapse p-3" id="demo1">
                            <p><b>Gold Medal (1st Place):</b> 0</p>
                            <p><b>Silver Medal (2nd Place):</b> 0</p>
                            <p><b>Bronze Medal (3rd Place):</b> 0</p>
                            <p><b>4th Place:</b> 0</p>
                            <p><b>5th Place:</b> 0</p>
                            <p><b>6th Place:</b> 0</p>
                            <p><b>7th Place:</b> 0</p>
                            <p><b>8th Place:</b> 0</p>
                            <p><b>TOTAL POINTS:</b> 0</p>
                        </div>
                    </td>
                </tr>
                {{-- TODO foreach till here --}}
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
