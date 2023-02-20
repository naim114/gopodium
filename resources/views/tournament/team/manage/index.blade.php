@extends('layouts.dashboard-master')

@section('page-title', $team->name)

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
    <a
        href="{{ route('tournament.team.manage', ['tournament_id' => $tourney->id, 'team_id' => $team->id]) }}">{{ $team->name }}</a>
    /
    <a>{{ trans('app.tourney.team.manage') }}</a>
@stop

@section('content')
    @include('tournament.team.partial.tab')

    <div class="container">

        @isset($message)
            <div class="alert alert-danger mb-3" role="alert">
                {{ $message }}
            </div>
        @endisset

        <div class="row">
            <div class="col-md-4 col-sm-6 pt-2 pb-2">
                <div class="card">
                    <div class="card-body">
                        @include('tournament.team.manage.logo')
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-6 pt-2 pb-2">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5>Team details</h5>
                    </div>
                    <div class="card-body">
                        @include('tournament.team.manage.details')
                    </div>
                </div>

                <button data-item="{{ $team }}" class="mb-2 btn btn-danger w-100 text-bold deleteButton">
                    Delete Team
                </button>
            </div>
        </div>

        <hr>

        <div class="col">
            @include('tournament.team.manage.managers')
        </div>
    </div>

    {{-- Invite Modal --}}
    @include('tournament.team.manage.invite')

    {{-- Uninvite Modal --}}
    @include('tournament.team.manage.uninvite')

    {{-- Delete Modal --}}
    @include('tournament.team.manage.delete')
@stop


@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#fileInput').val(null);
            $('.table').DataTable();
        });

        // invite modal
        $(".inviteButton").click(function() {
            $('#inviteModal').modal('show');
        });

        $(".closeInviteModal").click(function() {
            $('#inviteModal').modal('hide');
        });

        // uninvite modal
        $(".uninviteButton").click(function() {
            $('#uninviteModal').modal('show');
        });

        $(".closeUninviteModal").click(function() {
            $('#uninviteModal').modal('hide');
        });

        // delete modal
        $(".deleteButton").click(function() {
            $("#submit").prop("disabled", true);
            $('#deleteModal').modal('show');

            var team = $(this).data('item');
            $('#del_id').val(team.id);
            $('#del_name').val(team.name);

            $('#del_text').val(null);

            $('#warning').text(`
                WARNING:
                Are you sure you want to delete ${team.name}? Previous data can't be retrieve back.
                All the athletes data under this team will be deleted too.
                Type the team name and click Confirm Delete to confirm team deletion.
            `);
        });

        $(".closeDeleteModal").click(function() {
            $('#deleteModal').modal('hide');
        });

        $("#del_text").change(function() {
            $("#submit").prop("disabled", !($('#del_text').val() == $('#del_name').val()));
        });

        $(".closeDeleteModal").click(function() {
            $("#submit").prop("disabled", true);
            $('#deleteModal').modal('hide');
        });

        // front-end for logo button
        $(document).on("click", "#changeLogoButton", function() {
            $("#inputFileButton").removeClass('hide');
            $("#cancelChangeLogoButton").removeClass('hide');
            $("#submitLogoButton").removeClass('hide');
            $("#guideMsg").removeClass('hide');

            $("#changeLogoButton").addClass('hide');
        });

        $(document).on("click", "#cancelChangeLogoButton", function() {
            $("#inputFileButton").addClass('hide');
            $("#cancelChangeLogoButton").addClass('hide');
            $("#submitLogoButton").addClass('hide');
            $("#guideMsg").addClass('hide');

            $("#changeLogoButton").removeClass('hide');
            $('#fileInput').val(null);
        });

        $(document).on("click", ".browse", function() {
            var file = $(this).parents().find(".file");
            file.trigger("click");
        });

        $('#fileInput').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@stop
