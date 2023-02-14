@extends('layouts.dashboard-master')

@section('page-title', trans('app.tourney.team'))

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('tournament', ['id' => $tourney->id]) }}">{{ $tourney->code }}</a> /
    <a>{{ trans('app.tourney.team') }}</a>
@stop

@section('content')
    <div class="container">
        @include('tournament.partial.tab')

        <button class="btn btn-primary mb-2 addButton">
            + Add Team
        </button>
        <table class="table table-striped table-hover table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tourney->team as $team)
                    <tr>
                        <th scope="row">{{ $count++ }}</th>
                        <td><img height="35px" src="{{ asset($team->logo_path ?? 'assets/img/default-team.png') }}" /></td>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->category }}</td>
                        <td>{{ $team->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="fas fa-ellipsis-h fa-fw"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a href="{{ route('tournament.team.manage', ['tournament_id' => $tourney->id, 'team_id' => $team->id]) }}"
                                        class="dropdown-item">
                                        Manage Team
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('tournament.team.athletes') }}" class="dropdown-item">
                                        Athletes
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('tournament.team.event') }}" class="dropdown-item">
                                        Events
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('tournament.team.schedule') }}" class="dropdown-item">
                                        Schedule
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('tournament.team.result') }}" class="dropdown-item">
                                        Results
                                    </a>
                                </li>
                                <li>
                                    <button data-item="{{ $team }}" class="dropdown-item text-danger deleteButton">
                                        Delete
                                    </button>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Add Modal --}}
    @include('tournament.team.partial.add')

    {{-- Delete Modal --}}
    @include('tournament.team.partial.delete')
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
            $("#submit").prop("disabled", true);
            $('#deleteModal').modal('show');

            var team = $(this).data('item');
            $('#del_id').val(team.id);
            $('#del_name').val(team.name);

            $('#del_text').val(null);

            $('#warning').text(`
                WARNING:
                Are you sure you want to delete ${team.name}? Previous data can't be retrieve back.
                All the athletes data under this team will be deleted too.
                Type the plan name and click Confirm Delete to confirm plan deletion.
            `);
        });

        $(".closeDeleteModal").click(function() {
            $('#deleteModal').modal('hide');
        });

        $("#del_text").change(function() {
            $("#submit").prop("disabled", !($('#del_text').val() == $('#del_name').val()));
        });

        $(".closeDeleteModal").click(function() {
            $("#submit").prop("disabled", true);
            $('#deleteModal').modal('hide');
        });
    </script>
@stop
