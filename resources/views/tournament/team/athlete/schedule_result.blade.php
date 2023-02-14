@extends('layouts.dashboard-master')

@section('page-title', 'TEAM NAME HERE')

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('tournament', ['id' => $tourney->id]) }}">TOURNEY CODE HERE</a> /
    <a href="{{ route('tournament.team.manage', ['tournament_id' => $tourney->id, 'team_id' => $team->id]) }}">TEAM NAME
        HERE</a> /
    <a>ATHLETE NAME</a>

@stop

@section('content')
    @include('tournament.team.partial.tab')

    <div class="container">
        <table class="table table-striped table-hover table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>
                    <th scope="col">Category</th>
                    <th scope="col">Round</th>
                    <th scope="col">Type</th>
                    <th scope="col">Date & Time</th>
                    <th scope="col">Result</th>
                </tr>
            </thead>
            <tbody>
                {{-- TODO foreach here --}}
                <tr>
                    {{-- <th scope="row">{{ $count++ }}</th> --}}
                    <th scope="row">1</th>
                    <td>EVENT NAME</td>
                    <td>EVE001</td>
                    <td>L</td>
                    <td>Final</td>
                    <td>Individual Matchup</td>
                    <td>2/3/2023 3.45 p.m.</td>
                    <td>
                        <a href="{{ route('tournament.result.event') }}">View Result</a>
                    </td>
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
