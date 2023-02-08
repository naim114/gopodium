@extends('layouts.dashboard-master')

@section('page-title', 'EVENT NAME HERE')

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('tournament') }}">TOURNEY CODE HERE</a> /
    <a href="{{ route('tournament.event') }}">{{ trans('app.tourney.events') }}</a> /
    <a href="{{ route('tournament.event.manage') }}">EVENT NAME HERE</a> /
    <a>Manage</a>
@stop

@section('content')
    <div class="container">

    </div>

    @include('tournament.event.tab')

    {{-- Individual --}}
    {{-- Indivudal Matchup --}}
    @if (false)
        @include('tournament.event.participant.individual.matchup')
    @endif

    {{-- Indivudal Heat --}}
    @if (false)
        @include('tournament.event.participant.individual.heat')
    @endif

    {{-- Individual Modal --}}
    @if (false)
        {{-- Add Modal --}}
        @include('tournament.event.participant.individual.add')

        {{-- Delete Modal --}}
        @include('tournament.event.participant.individual.edit')

        {{-- Delete Modal --}}
        @include('tournament.event.participant.individual.delete')
    @endif

    {{-- Team --}}
    {{-- Team Matchup --}}
    @if (true)
        @include('tournament.event.participant.team.matchup')
    @endif

    {{-- Team Heat --}}
    @if (true)
        @include('tournament.event.participant.team.heat')
    @endif

    {{-- Team Modal --}}
    @if (true)
        {{-- Add Modal --}}
        @include('tournament.event.participant.team.add')

        {{-- Delete Modal --}}
        @include('tournament.event.participant.team.edit')

        {{-- Delete Modal --}}
        @include('tournament.event.participant.team.delete')
    @endif

@stop

@section('scripts')
    <script>
        // INDIVIDUAL
        // add Individual modal
        $(".addIndividualButton").click(function() {
            $('#addIndividualModal').modal('show');
        });

        $(".closeAddIndividualModal").click(function() {
            $('#addIndividualModal').modal('hide');
        });

        // edit Individual modal
        $(".editIndividualButton").click(function() {
            $('#editIndividualModal').modal('show');
        });

        $(".closeEditIndividualModal").click(function() {
            $('#editIndividualModal').modal('hide');
        });

        // delete Individual modal
        $(".deleteIndividualButton").click(function() {
            $('#deleteIndividualModal').modal('show');
        });

        $(".closeDeleteIndividualModal").click(function() {
            $('#deleteIndividualModal').modal('hide');
        });

        // TEAM
        // add Team modal
        $(".addTeamButton").click(function() {
            $('#addTeamModal').modal('show');
        });

        $(".closeAddTeamModal").click(function() {
            $('#addTeamModal').modal('hide');
        });

        // edit Team modal
        $(".editTeamButton").click(function() {
            $('#editTeamModal').modal('show');
        });

        $(".closeEditTeamModal").click(function() {
            $('#editTeamModal').modal('hide');
        });

        // delete Team modal
        $(".deleteTeamButton").click(function() {
            $('#deleteTeamModal').modal('show');
        });

        $(".closeDeleteTeamModal").click(function() {
            $('#deleteTeamModal').modal('hide');
        });
    </script>
@stop
