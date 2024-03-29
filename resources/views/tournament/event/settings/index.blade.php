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
    @include('tournament.event.tab')

    <form method="POST" action="{{ route('tournament.event.edit') }}">
        @csrf
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <p class="text-decoration-underline"><b>Event Details</b></p>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label>Event Name</label>
                            <input value="{{ $event->name }}" name="name" type="text" class="form-control"
                                placeholder="Enter event name" required>
                            <input value="{{ $tourney->id }}" name="tournament_id" type="text" hidden>
                            <input value="{{ $event->id }}" name="id" type="text" hidden>
                        </div>
                        <div class="form-group mb-2">
                            <label>Code</label>
                            <input value="{{ $event->code }}" name="code" type="text" class="form-control"
                                placeholder="Enter event code" required>
                        </div>
                        <div class="form-group mb-2">
                            <label>Category</label>
                            <input value="{{ $event->category }}" name="category" type="text" class="form-control"
                                placeholder="Enter category" required>
                        </div>
                        <div class="form-group mb-2">
                            <label>Highest To Win <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right"
                                    title="If yes, participant with the highest score win. If no, participant with the lowest score win."></i></label>
                            <select id="sort_by_highest" name="sort_by_highest" class="form-control" required>
                                <option value="0" {{ $event->sort_by_highest == '0' ? 'selected' : '' }}>No
                                </option>
                                <option value="1" {{ $event->sort_by_highest == '1' ? 'selected' : '' }}>Yes
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label>Round</label>
                            <input value="{{ $event->round }}" name="round" type="text" class="form-control"
                                placeholder="Enter round" required>
                        </div>
                        <div class="form-group mb-2">
                            <label>Start Date & Time</label>
                            <input value="{{ $event->start_at }}" name="start_at" type="datetime-local"
                                class="form-control" placeholder="Enter category" required>
                        </div>
                        <div class="form-group mb-2">
                            <label>End Date & Time</label>
                            <input value="{{ $event->end_at }}" name="end_at" type="datetime-local" class="form-control"
                                placeholder="Enter category" required>
                        </div>
                        <div class="form-group mb-2">
                            <label>Championship Event <i class="fa fa-info-circle" data-toggle="tooltip"
                                    data-placement="right"
                                    title="Medal will be awarded to top 3 and points will count based on tournament settings. Matchup Events: user can placed position on manage participants."></i></label>
                            <select id="championship" name="championship" class="form-control" required>
                                <option value="0" {{ $event->championship == '0' ? 'selected' : '' }}>No
                                </option>
                                <option value="1" {{ $event->championship == '1' ? 'selected' : '' }}>Yes
                                </option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <p class="text-decoration-underline"><b>Rules</b></p>
                        <div class="form-group mb-2">
                            <label>How many athletes per team allowed?</label>
                            <input value="{{ $event->athlete_per_team_limit }}" name="athlete_per_team_limit"
                                type="number" class="form-control" placeholder="Enter number of athletes">
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
    </form>

    {{-- Delete Modal --}}
    @include('tournament.event.manage.delete')
@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });

        // delete modal
        $(".deleteButton").click(function() {
            $('#deleteModal').modal('show');
        });

        $(".closeDeleteModal").click(function() {
            $('#deleteModal').modal('hide');
        });
    </script>
@stop
