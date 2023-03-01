@extends('layouts.dashboard-master')

@section('page-title', trans('app.tourney.schedule'))

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('tournament', ['id' => $tourney->id]) }}">{{ $tourney->code }}</a> /
    <a>{{ trans('app.tourney.schedule') }}</a>
@stop

@section('content')
    <div class="container">
        @include('tournament.partial.tab')

        {{-- TODO PRINT FEATURE --}}
        <table class="table table-striped table-hover table-responsive">
            <thead class="thead-dark">
                <tr class="align-middle">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>
                    <th scope="col">Category</th>
                    <th scope="col">Round</th>
                    <th scope="col">Type</th>
                    <th scope="col">Time</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 1;
                @endphp
                @foreach ($events as $event)
                    <tr class="align-middle">
                        <th scope="row">{{ $count++ }}</th>
                        <td>{{ $event->code }}</td>
                        <td>{{ $event->category }}</td>
                        <td>{{ $event->round }}</td>
                        <td>{{ $event->event_type->name }}</td>
                        <td>{{ $event->start_at->format('d/m/Y h:i A') }}</td>
                        <td>{{ $event->end_at->format('d/m/Y h:i A') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
