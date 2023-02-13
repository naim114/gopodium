@extends('layouts.dashboard-master')

@section('page-title', trans('app.tourney.info'))

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
    <a href="{{ route('tournament', ['id' => $tourney->id]) }}">{{ $tourney->name }}</a> /
    <a>{{ trans('app.tourney.info') }}</a>
@stop

@section('content')
    <div class="container">
        @include('tournament.partial.tab')

        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        @include('tournament.information.logo')
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5>Tournament Details</h5>
                        <h5>{{ $tourney->owner_id }}</h5>
                    </div>
                    <div class="card-body">
                        @include('tournament.information.details')
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5>Tournament Rules</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @include('tournament.information.rules')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5>Registration Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @include('tournament.information.registration')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable();
            $('#fileInput').val(null);
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
