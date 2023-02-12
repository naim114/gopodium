@extends('layouts.dashboard-master')

@section('page-title', trans('app.tourney.results'))

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('tournament', ['id' => $tourney->id]) }}">TOURNEY CODE HERE</a> /
    <a href="{{ route('tournament.result') }}">{{ trans('app.tourney.results') }}</a> /
    <a>EVENT NAME HERE</a>
@stop

@section('content')
    <div class="container">
        {{-- Individual --}}
        {{-- Indivudal Matchup --}}
        @if (false)
            @include('tournament.result.individual.matchup')
        @endif

        {{-- Indivudal Heat --}}
        @if (false)
            @include('tournament.result.individual.heat')
        @endif

        {{-- Team --}}
        {{-- Team Matchup --}}
        @if (true)
            @include('tournament.result.team.matchup')
        @endif

        {{-- Team Heat --}}
        @if (true)
            @include('tournament.result.team.heat')
        @endif
    </div>
@stop
