@extends('layouts.dashboard-master')

@section('page-title', $event->name)

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('tournament', ['id' => $tourney->id]) }}">{{ $tourney->code }}</a> /
    <a href="{{ route('tournament.event', ['tournament_id' => $tourney->id]) }}">{{ trans('app.tourney.events') }}</a> /
    <a
        href="{{ route('tournament.event.manage', ['tournament_id' => $tourney->id, 'event_id' => $event->id]) }}">{{ $event->name }}</a>
    /
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
                        <input value="{{ $event->name }}" name="name" type="text" class="form-control"
                            placeholder="Enter event name">
                    </div>
                    <div class="form-group mb-2">
                        <label>Code</label>
                        <input value="{{ $event->code }}" name="code" type="text" class="form-control"
                            placeholder="Enter event code">
                    </div>
                    <div class="form-group mb-2">
                        <label>Category</label>
                        <input value="{{ $event->category }}" name="category" type="text" class="form-control"
                            placeholder="Enter category">
                    </div>
                    <div class="form-group mb-2">
                        <label>Round</label>
                        <input value="{{ $event->round }}" name="round" type="text" class="form-control"
                            placeholder="Enter round">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <label>Type</label>
                        <select name="event_type_id" class="mt-2 form-control" required>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}"
                                    {{ $type->id == $event->event_type_id ? 'selected' : '' }}>{{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Start Date & Time</label>
                        <input value="{{ $event->start_at }}" name="start_at" type="datetime-local" class="form-control"
                            placeholder="Enter category">
                    </div>
                    <div class="form-group mb-2">
                        <label>End Date & Time</label>
                        <input value="{{ $event->end_at }}" name="end_at" type="datetime-local" class="form-control"
                            placeholder="Enter category">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <p class="text-decoration-underline"><b>Rules</b></p>
                    <div class="form-group mb-2">
                        <label>How many athletes per team allowed?</label>
                        <input value="{{ $event->athlete_per_team_limit }}" name="athlete_per_team_limit" type="number"
                            class="form-control" placeholder="Enter number of athletes">
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row-reverse mt-3">
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
