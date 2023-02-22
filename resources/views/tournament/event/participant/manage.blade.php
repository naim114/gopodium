@extends('layouts.dashboard-master')

@section('page-title', $event->name)

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('tournament', ['id' => $tourney->id]) }}">{{ $tourney->code }}</a> /
    <a href="{{ route('tournament.event', ['tournament_id' => $tourney->id]) }}">{{ trans('app.tourney.events') }}</a> /
    <a
        href="{{ route('tournament.event.manage', ['tournament_id' => $tourney->id, 'event_id' => $event->id]) }}">{{ $event->name }}</a>
    /
    <a>Manage</a>
@stop

@section('content')
    <div class="container">

    </div>

    @include('tournament.event.tab')

    {{-- Individual --}}
    {{-- Individual Matchup --}}
    @if ($event->event_type->name == 'Individual Matchup')
        @include('tournament.event.participant.individual.matchup')
    @endif

    {{-- Individual Heat --}}
    @if ($event->event_type->name == 'Individual Heat')
        @include('tournament.event.participant.individual.heat')
    @endif

    {{-- Individual Modal --}}
    @if ($event->event_type->name == 'Individual Matchup' || $event->event_type->name == 'Individual Heat')
        {{-- Add Modal --}}
        @include('tournament.event.participant.individual.add')

        {{-- Delete Modal --}}
        @include('tournament.event.participant.individual.edit')

        {{-- Delete Modal --}}
        @include('tournament.event.participant.individual.delete')
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

    {{-- Team Modal --}}
    @if ($event->event_type->name == 'Team Matchup' || $event->event_type->name == 'Team Heat')
        {{-- Add Modal --}}
        @include('tournament.event.participant.team.add')

        {{-- Delete Modal --}}
        @include('tournament.event.participant.team.edit')

        {{-- Delete Modal --}}
        @include('tournament.event.participant.team.delete')
    @endif
@stop

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- CDN link used below is compatible with this example -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

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
            var participant = $(this).data('item');

            if (participant == '') {
                $(".individualAthlete select").val("").change();
                $('.selectpicker').selectpicker('refresh');
                $("#score").val(null);
                $("#id").val(null);
                $("#note").val(null);
                $('#editIndividualModal').modal('show');
            } else {
                $(".individualAthlete select").val(participant.athlete.id).change();
                $('.selectpicker').selectpicker('refresh');
                $("#score").val(participant.score);
                $("#id").val(participant.id);
                $("#note").val(participant.note);
                $('#editIndividualModal').modal('show');
            }
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
