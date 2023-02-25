@extends('layouts.dashboard-master')

@section('page-title', trans('app.tourney.standing'))

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('tournament', ['id' => $tourney->id]) }}">{{ $tourney->code }}</a> /
    <a>{{ trans('app.tourney.standing') }}</a>
@stop

@section('content')
    <div class="container">
        @include('tournament.partial.tab')
    </div>

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
            <tr class="align-middle">
                {{-- <th scope="row">{{ $count++ }}</th> --}}
                <th scope="row">1</th>
                <td>TEAM 1</td>
                <td>2</td>
                <td>5</td>
                <td>3</td>
                <td>10.00</td>
            </tr>
            {{-- TODO foreach till here --}}
        </tbody>
    </table>
@stop
