@extends('layouts.dashboard-master')

@section('page-title', trans('app.roles'))
@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('roles') }}">{{ trans('app.roles-permissions') }}</a> /
    <a>{{ trans('app.roles') }}</a>
@stop

@section('content')
    <div class="container">
        <button class="btn btn-primary mb-2 addButton">
            + Add Roles
        </button>
        <table id="rolesTable" class="table table-striped table-hover table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Display Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Removable</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <th scope="row">{{ $count++ }}</th>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>{{ $role->removable ? 'Yes' : 'No' }}</td>
                        <td>{{ $role->created_at }}</td>
                        <td>
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="fas fa-ellipsis-h fa-fw"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <button data-role="{{ $role }}" class="dropdown-item editButton">
                                        Edit Role
                                    </button>
                                </li>
                                @if ($role->removable)
                                    <li>
                                        <button data-role="{{ $role }}"
                                            class="dropdown-item text-danger deleteButton">
                                            Delete Role
                                        </button>
                                    </li>
                                @endif
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modals --}}
    {{-- Add Modal --}}
    @include('roles.partials.add')

    {{-- Edit Modal --}}
    @include('roles.partials.edit')

    {{-- Delete Modal --}}
    @include('roles.partials.delete')

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

            var role = $(this).data('role');

            $('#editModalName').val(role.name);
            $('#editModalId').val(role.id);
            $('#editModalDisplayName').val(role.display_name);
            $('#editModalDescription').val(role.description);
        });

        $(".closeEditModal").click(function() {
            $('#editModal').modal('hide');
        });

        // delete modal
        $(".deleteButton").click(function() {
            $('#deleteModal').modal('show');

            var role = $(this).data('role');

            $('#deleteModalId').val(role.id);
            $('#textBanModal').text('Are you sure you want to delete role ' + role.name +
                ' ?');
        });

        $(".closeDeleteModal").click(function() {
            $('#deleteModal').modal('hide');
        });
    </script>
@stop
