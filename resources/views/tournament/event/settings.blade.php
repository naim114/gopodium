@extends('layouts.dashboard-master')

@section('page-title', 'EVENT NAME HERE')

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('tournament') }}">TOURNEY CODE HERE</a> /
    <a href="{{ route('tournament.event') }}">{{ trans('app.tourney.events') }}</a> /
    <a href="{{ route('tournament.event.manage') }}">EVENT NAME HERE</a> /
    <a>Settings</a>
@stop

@section('content')
    <div class="container">
        @isset($message)
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @endisset
    </div>

    {{-- Delete Modal --}}
    @include('tournament.event.delete')
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
