@extends('layouts.dashboard-master')

@section('page-title', trans('app.tourney.events'))

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('tournament') }}">TOURNEY CODE HERE</a> /
    <a>{{ trans('app.tourney.events') }}</a>
@stop

@section('content')
    <div class="container">
        @isset($message)
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @endisset
        <button class="btn btn-primary mb-2 addButton">
            + Add Events
        </button>

        <nav>
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
                @include('tournament.event.upcoming')
            </div>
            <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">
                @include('tournament.event.ongoing')
            </div>
            <div class="tab-pane fade" id="nav-three" role="tabpanel" aria-labelledby="nav-three-tab">
                @include('tournament.event.finished')
            </div>
        </div>
    </div>

    {{-- Add Modal --}}
    @include('tournament.event.add')

    {{-- Delete Modal --}}
    @include('tournament.event.delete')
@stop

@section('scripts')
    <script>
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
