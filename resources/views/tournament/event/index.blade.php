@extends('layouts.dashboard-master')

@section('page-title', trans('app.tourney.events'))

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('tournament', ['id' => $tourney->id]) }}">{{ $tourney->code }}</a> /
    <a>{{ trans('app.tourney.events') }}</a>
@stop

@section('content')
    <div class="container">
        @include('tournament.partial.tab')

        <button class="btn btn-primary mb-2 addButton">
            + Add Events
        </button>

        <nav class="mb-2">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-one-tab" data-bs-toggle="tab" data-bs-target="#nav-one" type="button"
                    role="tab" aria-controls="nav-one" aria-selected="true">Upcoming</button>
                <button class="nav-link" id="nav-two-tab" data-bs-toggle="tab" data-bs-target="#nav-two" type="button"
                    role="tab" aria-controls="nav-two" aria-selected="false">Ongoing</button>
                <button class="nav-link" id="nav-three-tab" data-bs-toggle="tab" data-bs-target="#nav-three" type="button"
                    role="tab" aria-controls="nav-three" aria-selected="false">Finished</button>
            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                @include('tournament.event.status.upcoming')
            </div>
            <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">
                @include('tournament.event.status.ongoing')
            </div>
            <div class="tab-pane fade" id="nav-three" role="tabpanel" aria-labelledby="nav-three-tab">
                @include('tournament.event.status.finished')
            </div>
        </div>
    </div>

    {{-- Add Modal --}}
    @include('tournament.event.manage.add')

    {{-- Delete Modal --}}
    @include('tournament.event.manage.delete')
@stop

@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        });

        // add modal
        $(".addButton").click(function() {
            $('#addModal').modal('show');
        });

        $(".closeAddModal").click(function() {
            $('#addModal').modal('hide');
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
