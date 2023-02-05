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
    <a href="{{ route('tournament') }}">TOURNEY CODE HERE</a> /
    <a>{{ trans('app.tourney.info') }}</a>
@stop

@section('content')
    <div class="container">
        @isset($message)
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @endisset

        <div class="row">
            <div class="card mb-3">
                <div class="card-header">
                    <h5>Tournament Details</h5>
                </div>
                <div class="card-body">
                    @include('tournament.information.details')
                    <hr>
                    @include('tournament.information.logo')
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    <h5>Registration Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @include('tournament.information.registration')
                        <hr>
                        @include('tournament.information.payment')
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Modal --}}
    @include('tournament.information.payment_add')
@stop


@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable();
            $('#fileInputLogo').val(null);
        });

        // add modal
        $(".addButton").click(function() {
            $('#addModal').modal('show');
        });

        $(".closeAddModal").click(function() {
            $('#addModal').modal('hide');
        });

        // front-end for logo button
        $(document).on("click", "#changeLogoButton", function() {
            $("#inputFileButtonLogo").removeClass('hide');
            $("#cancelChangeLogoButton").removeClass('hide');
            $("#submitLogoButton").removeClass('hide');
            $("#guideMsgLogo").removeClass('hide');

            $("#changeLogoButton").addClass('hide');
        });

        $(document).on("click", "#cancelChangeLogoButton", function() {
            $("#inputFileButtonLogo").addClass('hide');
            $("#cancelChangeLogoButton").addClass('hide');
            $("#submitLogoButton").addClass('hide');
            $("#guideMsgLogo").addClass('hide');

            $("#changeLogoButton").removeClass('hide');
            $('#fileInputLogo').val(null);
        });

        $(document).on("click", ".browseLogo", function() {
            var fileLogo = $(this).parents().find(".fileLogo");
            fileLogo.trigger("click");
        });

        $('#fileInputLogo').change(function(e) {
            var fileName = e.target.files[0].name;
            console.log(fileName);
            $("#fileLogo").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("previewLogo").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@stop
