@extends('layouts.dashboard-master')

@section('page-title', trans('app.tourney.manage'))

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
    <a href="{{ route('tournament.manage') }}">{{ trans('app.tourney') }}</a> /
    <a>{{ trans('app.tourney.manage') }}</a>
@stop

@section('content')
    <div class="container">
        <button class="btn btn-primary mb-2 addButton">
            + Request Add Tournament
        </button>
        <table class="table table-striped table-hover table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    {{-- <th scope="col">User</th>   --}}{{-- only for user that have permision to manage all tournament  --}}
                    <th scope="col">Code</th>
                    <th scope="col">Registered at</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">Expiration Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- TODO foreach here --}}
                <tr>
                    {{-- <th scope="row">{{ $count++ }}</th> --}}
                    <th scope="row">1</th>
                    <td>TOURNAMENT 1</td>
                    {{-- <td>Username</td>  --}}{{-- only for user that have permision to manage all tournament  --}}
                    <td>MMSM2020</td>
                    <td>1/2/2023 10.34 a.m</td>
                    <td>2/2/2023 12.00 p.m</td>
                    <td>5/2/2023 12.00 p.m</td>
                    <td class="text-success"><b>Active</b></td>
                    <td>
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="fas fa-ellipsis-h fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a href="{{ route('tournament') }}" class="dropdown-item">
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
                {{-- TODO foreach till here --}}
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
