@extends('layouts.dashboard-master')

@section('page-title', trans('app.tourney.team'))

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('tournament') }}">TOURNEY CODE HERE</a> /
    <a>{{ trans('app.tourney.team') }}</a>
@stop

@section('content')
    <div class="container">
        @isset($message)
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @endisset
        <button class="btn btn-primary mb-2 addButton">
            + Add Team
        </button>
        <table id="permissionsTable" class="table table-striped table-hover table-responsive">
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
                {{-- TODO foreach here --}}
                <tr>
                    {{-- <th scope="row">{{ $count++ }}</th> --}}
                    <th scope="row">1</th>
                    <td><img height="35px" src="{{ asset('assets/img/default-team.png') }}" /></td>
                    <td>TOURNAMENT 1</td>
                    <td>MMSM2020</td>
                    <td>5/2/2023 12.00 p.m</td>
                    <td>
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="fas fa-ellipsis-h fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a href="{{ route('tournament.team.manage') }}" class="dropdown-item">
                                    Manage Team
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('tournament.team.athlete') }}" class="dropdown-item">
                                    Athletes
                                </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item">
                                    Event List
                                </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item">
                                    Results
                                </a>
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
            $('#deleteModal').modal('show');
        });

        $(".closeDeleteModal").click(function() {
            $('#deleteModal').modal('hide');
        });
    </script>
@stop
