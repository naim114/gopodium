@extends('layouts.dashboard-master')

@section('page-title', trans('app.notification'))

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('notification') }}">{{ trans('app.notification') }}</a> /
    <a>View</a>
@stop

@section('content')
    <div class="container">
        {{-- FOREACH HERE --}}
        <div class="card mb-4">
            <a href="{{ route('notification.view') }}" class="text-decoration-none" style="color: inherit;">
                <div class="card-body">
                    <h5 class="text-truncate"><b>Welcome!</b></h5>
                    <p class="text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi consectetur, sem
                        in vestibulum
                        posuere,
                        dolor ipsum scelerisque justo, sit amet mattis felis neque quis lacus. Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit. Morbi consectetur, sem in vestibulum posuere, dolor ipsum scelerisque
                        justo, sit amet mattis felis neque quis lacus.</p>
                </div>
            </a>
            <div class="card-footer">
                <div class="d-flex flex-row-reverse">
                    <div class="p-2"><a class="text-danger deleteButton">Delete</a>
                    </div>
                    <div class="p-2"><a href="{{ route('notification.view') }}">View full notification</a></div>
                </div>
            </div>
        </div>
        {{-- FOREACH TILL HERE --}}
    </div>

    {{-- Delete Modal --}}
    @include('notification.delete')
@stop


@section('scripts')
    <script>
        // delete modal
        $(".deleteButton").click(function() {
            $('#deleteModal').modal('show');

            var permission = $(this).data('permission');

            $('#deleteModalId').val(permission.id);
            $('#textBanModal').text('Are you sure you want to delete permission ' + permission.name +
                ' ?');
        });

        $(".closeDeleteModal").click(function() {
            $('#deleteModal').modal('hide');
        });
    </script>
@stop
