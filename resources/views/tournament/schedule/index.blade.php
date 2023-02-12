@extends('layouts.dashboard-master')

@section('page-title', trans('app.tourney.schedule'))

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('tournament', ['id' => $tourney->id]) }}">TOURNEY CODE HERE</a> /
    <a>{{ trans('app.tourney.schedule') }}</a>
@stop

@section('content')
    <div class="container">
        @include('tournament.partial.tab')

        <h5>Saturday, 5 December 2022</h5>
        <table class="table table-striped table-hover table-responsive">
            <thead class="thead-dark">
                <tr>
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
                <tr>
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
