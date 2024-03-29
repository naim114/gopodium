@extends('layouts.dashboard-master')

@section('page-title', 'TEAM NAME HERE')

@section('custom-head')
    <style>
        .hide {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            border: 0;
        }
    </style>
@stop

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('tournament', ['id' => $tourney->id]) }}">{{ $tourney->code }}</a> /
    <a href="{{ route('tournament.team.manage', ['tournament_id' => $tourney->id, 'team_id' => $team->id]) }}">TEAM NAME
        HERE</a> /
    <a>{{ trans('app.tourney.schedule') }}</a>
@stop

@section('content')
    @include('tournament.team.partial.tab')

    <div class="container">
        <h5>Saturday, 5 December 2022</h5>
        <table class="table table-striped table-hover table-responsive">
            <thead class="thead-dark">
                <tr class="align-middle">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>
                    <th scope="col">Category</th>
                    <th scope="col">Round</th>
                    <th scope="col">Type</th>
                    <th scope="col">Time</th>
                </tr>
            </thead>
            <tbody>
                {{-- TODO foreach here --}}
                <tr class="align-middle">
                    {{-- <th scope="row">{{ $count++ }}</th> --}}
                    <th scope="row">1</th>
                    <td>EVENT NAME</td>
                    <td>EVE001</td>
                    <td>L</td>
                    <td>Final</td>
                    <td>Individual Matchup</td>
                    <td>3.45 p.m.</td>
                </tr>
                {{-- TODO foreach till here --}}
            </tbody>
        </table>
    </div>
@stop

@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        });
    </script>
@stop
