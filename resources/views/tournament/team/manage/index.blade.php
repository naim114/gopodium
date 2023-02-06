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
    <a href="{{ route('tournament') }}">TOURNEY CODE HERE</a> /
    <a href="{{ route('tournament.team.manage') }}">TEAM NAME HERE</a> /
    <a>{{ trans('app.tourney.team.manage') }}</a>
@stop

@section('content')
    <div class="container">
        @isset($message)
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @endisset

        <div class="row">
            <div class="col-md-4 col-sm-6 pt-2 pb-2">
                <div class="card">
                    <div class="card-body">
                        @include('tournament.information.logo')
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

                <a class="mb-2 btn btn-secondary w-100" href="{{ route('tournament.team.athlete') }}">
                    Manage Athlete
                </a>
                <a class="mb-2 btn btn-secondary w-100" href="">
                    View Event List
                </a>
                <a class="mb-2 btn btn-secondary w-100" href="">
                    View Results
                </a>
                <button class="mb-2 btn btn-danger w-100 text-bold deleteButton">
                    Delete Team
                </button>
            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    @include('tournament.team.manage.delete')
@stop


@section('scripts')
    <script>
        $(document).ready(function() {
            $('#fileInput').val(null);
        });

        // delete modal
        $(".deleteButton").click(function() {
            $('#deleteModal').modal('show');
        });

        $(".closeDeleteModal").click(function() {
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
