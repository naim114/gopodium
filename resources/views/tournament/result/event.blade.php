@extends('layouts.dashboard-master')

@section('page-title', trans('app.tourney.results'))

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('tournament', ['id' => $tourney->id]) }}">{{ $tourney->code }}</a> /
    <a href="{{ route('tournament.result', ['tournament_id' => $tourney->id]) }}">{{ trans('app.tourney.results') }}</a> /
    <a>{{ $event->name }}</a>
@stop

@section('content')
    <div class="container">
        {{-- Individual --}}
        {{-- Individual Matchup --}}
        @if ($event->event_type->name == 'Individual Matchup')
            @include('tournament.event.participant.individual.matchup')
        @endif

        {{-- Individual Heat --}}
        @if ($event->event_type->name == 'Individual Heat')
            @include('tournament.event.participant.individual.heat')
        @endif

        {{-- Team --}}
        {{-- Team Matchup --}}
        @if ($event->event_type->name == 'Team Matchup')
            @include('tournament.event.participant.team.matchup')
        @endif

        {{-- Team Heat --}}
        @if ($event->event_type->name == 'Team Heat')
            @include('tournament.event.participant.team.heat')
        @endif
    </div>
@stop
