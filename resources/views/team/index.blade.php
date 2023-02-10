@extends('layouts.dashboard-master')

@section('page-title', trans('app.teams'))

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('team') }}">{{ trans('app.teams') }}</a> /
    <a>{{ trans('app.teams.manage') }}</a>
@stop

@section('content')
    <div class="container">
        <table class="table table-striped table-hover table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th>Logo</th>
                    <th scope="col">Team Name</th>
                    <th scope="col">Tournament Name</th>
                    <th scope="col">Tournament Code</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- TODO foreach here --}}
                <tr>
                    {{-- <th scope="row">{{ $count++ }}</th> --}}
                    <th scope="row">1</th>
                    <td><img height="35px" src="{{ asset('assets/img/default-team.png') }}" /></td>
                    <td>TEAM NAME</td>
                    <td>TOURNAMENT 1</td>
                    <td>MSSM220</td>
                    <td>
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="fas fa-ellipsis-h fa-fw"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <button class="dropdown-item text-danger uninviteButton">
                                    Uninvite Myself
                                </button>
                            </li>
                        </ul>
                    </td>
                </tr>
                {{-- TODO foreach till here --}}
            </tbody>
        </table>
    </div>

    {{-- Uninvite Modal --}}
    @include('team.uninvite')
@stop

@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        });

        // uninvite modal
        $(".uninviteButton").click(function() {
            $('#uninviteModal').modal('show');
        });

        $(".closeUninviteModal").click(function() {
            $('#uninviteModal').modal('hide');
        });
    </script>
@stop
