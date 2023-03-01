@extends('layouts.dashboard-master')

@section('page-title', trans('app.tourney.results'))

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('tournament', ['id' => $tourney->id]) }}">{{ $tourney->code }}</a> /
    <a>{{ trans('app.tourney.results') }}</a>
@stop

@section('content')
    <div class="container">
        @include('tournament.partial.tab')

        <table class="table table-striped table-hover table-responsive">
            <thead class="thead-dark">
                <tr class="align-middle">
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>
                    <th scope="col">Category</th>
                    <th scope="col">Round</th>
                    <th scope="col">Type</th>
                    <th scope="col">Start at</th>
                    <th scope="col">End at</th>
                    <th scope="col">Result</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr class="align-middle">
                        <td>
                            @if ($event->championship == true && $event->status == 'finished')
                                <b>[Championship]</b>
                            @endif
                            {{ ' ' . $event->name }}
                        </td>
                        <td>{{ $event->code }}</td>
                        <td>{{ $event->category }}</td>
                        <td>{{ $event->round }}</td>
                        <td>{{ $event->event_type->name }}</td>
                        <td>{{ $event->start_at->format('d/m/Y h:i A') }}</td>
                        <td>{{ $event->end_at->format('d/m/Y h:i A') }}</td>
                        <td>
                            <a
                                href="{{ route('tournament.result.event', ['tournament_id' => $tourney->id, 'event_id' => $event->id]) }}">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                order: [
                    [5, 'desc']
                ],
            });
        });
    </script>
@stop
