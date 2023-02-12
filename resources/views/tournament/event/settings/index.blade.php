@extends('layouts.dashboard-master')

@section('page-title', 'EVENT NAME HERE')

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('tournament', ['id' => $tourney->id]) }}">TOURNEY CODE HERE</a> /
    <a href="{{ route('tournament.event') }}">{{ trans('app.tourney.events') }}</a> /
    <a href="{{ route('tournament.event.manage') }}">EVENT NAME HERE</a> /
    <a>Settings</a>
@stop

@section('content')
    <div class="container">

    </div>

    @include('tournament.event.tab')

    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <p class="text-decoration-underline"><b>Event Details</b></p>
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <label>Event Name</label>
                        <input name="name" type="text" class="form-control" placeholder="Enter event name">
                    </div>
                    <div class="form-group mb-2">
                        <label>Code</label>
                        <input name="category" type="text" class="form-control" placeholder="Enter event code">
                    </div>
                    <div class="form-group mb-2">
                        <label>Category</label>
                        <input name="category" type="text" class="form-control" placeholder="Enter category">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <label>Round</label>
                        <input name="category" type="text" class="form-control" placeholder="Enter category">
                    </div>
                    <div class="form-group mb-2">
                        <label>Type</label>
                        <select name="type" class="mt-2 form-control" required>
                            <option value="">Individual Matchup</option>
                            <option value="">Team Matchup</option>
                            <option value="">Individual Heat</option>
                            <option value="">Team Heat</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Date & Time</label>
                        <input name="datetime" type="datetime-local" class="form-control" placeholder="Enter date & time">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <p class="text-decoration-underline"><b>Rules</b></p>
                    <div class="form-group mb-2">
                        <label>How many athletes per team allowed?</label>
                        <input name="category" type="number" class="form-control" placeholder="Enter number of athletes">
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row-reverse">
                <button type="submit" class="btn btn-primary float-right">
                    Update Details
                </button>
            </div>
        </div>
    </div>




    {{-- Delete Modal --}}
    @include('tournament.event.manage.delete')
@stop

@section('scripts')
    <script>
        // delete modal
        $(".deleteButton").click(function() {
            $('#deleteModal').modal('show');
        });

        $(".closeDeleteModal").click(function() {
            $('#deleteModal').modal('hide');
        });
    </script>
@stop
