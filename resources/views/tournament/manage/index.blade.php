@extends('layouts.dashboard-master')

@section('page-title', trans('app.tourneys'))

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
    <a href="{{ route('tournament.manage') }}">{{ trans('app.tourneys') }}</a> /
    <a>{{ trans('app.tourney.manage') }}</a>
@stop

@section('content')
    <div class="container">
        <button class="btn btn-primary mb-2 addButton">
            + Request Add Tournament
        </button>
        <table class="table table-striped table-hover table-responsive">
            <thead class="thead-dark">
                <tr class="align-middle">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    @if (has_permission('tournament.all'))
                        <th scope="col">User</th>
                    @endif
                    <th scope="col">Code</th>
                    <th scope="col">Plan</th>
                    <th scope="col">Registered at</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">Expiration Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tournaments as $tourney)
                    <tr class="align-middle">
                        <th scope="row">{{ $count++ }}</th>
                        <td>{{ $tourney->name }}</td>
                        @if (has_permission('tournament.all'))
                            <td><a
                                    href="{{ route('users.view', ['action' => 'profile', 'id' => $tourney->owner_id]) }}">{{ get_user_detail($tourney->owner_id, 'username') }}</a>
                            </td>
                        @endif
                        <td>{{ $tourney->code }}</td>
                        <td>{{ get_plan_detail($tourney->plan_id, 'name') }}</td>
                        <td>{{ $tourney->created_at->format('d/m/Y') }}</td>
                        <td>{{ $tourney->start_at->format('d/m/Y') }}</td>
                        <td>{{ $tourney->end_at->format('d/m/Y') }}</td>

                        @if ($tourney->status == 'upcoming')
                            <td>
                                <p class="text-secondary"><b>Upcoming</b></p>
                            </td>
                        @elseif ($tourney->status == 'ongoing')
                            <td>
                                <p class="text-warning"><b>Ongoing</b></p>
                            </td>
                        @elseif ($tourney->status == 'finished')
                            <td>
                                <p class="text-success"><b>Finished</b></p>
                            </td>
                        @endif

                        <td>
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="fas fa-ellipsis-h fa-fw"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a href="{{ route('tournament', ['id' => $tourney->id]) }}" class="dropdown-item">
                                        Manage
                                    </a>
                                </li>
                                {{-- TODO only to that have permission --}}
                                <li>
                                    <button class="dropdown-item editButton">
                                        Change Status
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
    @include('tournament.manage.add')

    {{-- Edit Modal --}}
    @include('tournament.manage.edit')
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

        // edit modal
        $(".editButton").click(function() {
            $('#editModal').modal('show');
        });

        $(".closeEditModal").click(function() {
            $('#editModal').modal('hide');
        });
    </script>
@stop
