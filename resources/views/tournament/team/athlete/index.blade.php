@extends('layouts.dashboard-master')

@section('page-title', 'TEAM NAME HERE')

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
    <a href="{{ route('tournament', ['id' => $tourney->id]) }}">TOURNEY CODE HERE</a> /
    <a href="{{ route('tournament.team.manage') }}">TEAM NAME HERE</a> /
    <a>{{ trans('app.tourney.team.athlete') }}</a>
@stop

@section('content')
    @include('tournament.team.partial.tab')

    <div class="container">

        <button class="btn btn-primary mb-2 addButton">
            + Add Athlete
        </button>
        <table class="table table-striped table-hover table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- TODO foreach here --}}
                <tr>
                    {{-- <th scope="row">{{ $count++ }}</th> --}}
                    <th scope="row">1</th>
                    <td>ATHLETE NAME</td>
                    <td>
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="fas fa-ellipsis-h fa-fw"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a href="{{ route('tournament.team.athlete') }}" class="dropdown-item">
                                    Schedule & Result
                                </a>
                            </li>
                            <li>
                                <button class="dropdown-item editButton">
                                    Edit
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item text-danger deleteButton">
                                    Delete
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
    @include('tournament.team.athlete.add')

    {{-- Edit Modal --}}
    @include('tournament.team.athlete.edit')

    {{-- Delete Modal --}}
    @include('tournament.team.athlete.delete')
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

        // delete modal
        $(".deleteButton").click(function() {
            $('#deleteModal').modal('show');
        });

        $(".closeDeleteModal").click(function() {
            $('#deleteModal').modal('hide');
        });
    </script>
@stop
