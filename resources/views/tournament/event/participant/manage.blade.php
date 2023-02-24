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

        {{-- Edit Modal --}}
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

        {{-- Edit Modal --}}
        @include('tournament.event.participant.team.edit')

        {{-- Delete Modal --}}
        @include('tournament.event.participant.team.delete')

        {{-- Add Item Modal --}}
        @include('tournament.event.participant.team.item_add')

        {{-- Delete Item Modal --}}
        @include('tournament.event.participant.team.item_delete')
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
        // TODO add Individual modal
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
            } else {
                $(".individualAthlete select").val(participant.athlete.id).change();
                $('.selectpicker').selectpicker('refresh');
                $("#id").val(participant.id);
                $("#score").val(participant.score);
                $("#note").val(participant.note);
            }
            $('#editIndividualModal').modal('show');

        });

        $(".closeEditIndividualModal").click(function() {
            $('#editIndividualModal').modal('hide');
        });

        // delete Individual modal
        $(".deleteIndividualButton").click(function() {
            var participant = $(this).data('item');

            $('#warning').text(`
                WARNING:
                Are you sure you want to delete ${participant.athlete.name} participant record for this event? Previous data can't be retrieve back.
            `);
            $('#deleteIndividualModalId').val(participant.id);
            $('#deleteIndividualModal').modal('show');
        });

        $(".closeDeleteIndividualModal").click(function() {
            $('#deleteIndividualModal').modal('hide');
        });

        // TEAM
        // TODO add Team modal
        $(".addTeamButton").click(function() {
            $('#addTeamModal').modal('show');
        });

        $(".closeAddTeamModal").click(function() {
            $('#addTeamModal').modal('hide');
        });

        // edit Team modal
        $(".editTeamButton").click(function() {
            var participant = $(this).data('item');

            if (participant == '') {
                $("#id").val(null);
                $("#team").val('');
                $("#score").val(null);
                $("#note").val(null);
            } else {
                $("#id").val(participant.id);
                $('#team').val(participant.team.id);
                $('#score').val(participant.score);
                $('#note').val(participant.note);
            }

            $('#editTeamModal').modal('show');
        });

        $(".closeEditTeamModal").click(function() {
            $('#editTeamModal').modal('hide');
        });

        // delete Team modal
        $(".deleteTeamButton").click(function() {
            var participant = $(this).data('item');

            $('#warning').text(`
                WARNING:
                Are you sure you want to delete ${participant.team.name} participant record for this event? Associated athlete record will be deleted. Previous data can't be retrieve back.
            `);
            $('#deleteTeamModalId').val(participant.id);

            $('#deleteTeamModal').modal('show');
        });

        $(".closeDeleteTeamModal").click(function() {
            $('#deleteTeamModal').modal('hide');
        });

        // PARTICIPANT ITEM
        // add
        $(".addItemButton").click(function() {
            var p = $(this).data('participant');
            $('#p').val(p.id);

            var athletes = $(this).data('item');

            $('#athletes')
                .find('option')
                .remove()
                .end();

            $('#athletes').append($('<option>', {
                value: '',
                text: 'Select an athlete',
            }));

            $.each(athletes, function(i, athlete) {
                $('#athletes').append($('<option>', {
                    value: athlete.id,
                    text: athlete.name,
                }));
            });
            $('.selectpicker').selectpicker('refresh');

            $(".teamAthlete select").val("").change();
            $('.selectpicker').selectpicker('refresh');

            $('#addItemModal').modal('show');
        });

        $(".closeAddItemModal").click(function() {
            $('#addItemModal').modal('hide');
        });

        // delete
        $(".deleteItemButton").click(function() {
            var item = $(this).data('item');

            $('#warningDeleteItem').text(`
                WARNING:
                Are you sure you want to delete ${item.athlete.name} as participant for this event? Previous data can't be retrieve back.
            `);
            $('#deleteItemModalId').val(item.id);

            $('#deleteItemModal').modal('show');
        });

        $(".closeDeleteItemModal").click(function() {
            $('#deleteItemModal').modal('hide');
        });
    </script>
@stop
