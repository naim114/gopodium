@extends('layouts.dashboard-master')

@section('custom-head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.2/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            height: "200",
        });
    </script>
    <style>
        .mce-notification {
            display: none !important;
        }
    </style>
@stop

@section('page-title', trans('app.notification'))

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('notification') }}">{{ trans('app.notification') }}</a> /
    <a>View</a>
@stop

@section('content')
    <div class="container">
        @if (has_permission('notification'))
            <button class="btn btn-primary mb-3 addButton">
                + Post Notification
            </button>
        @endif

        @foreach ($notifications as $notification)
            <div class="card mb-4">
                <a href="{{ route('notification.view', ['id' => $notification->id]) }}" class="text-decoration-none"
                    style="color: inherit;">
                    <div class="card-body">
                        <h5 class="text-truncate">{{ $notification->title }}</h5>
                    </div>
                </a>
                <div class="card-footer">
                    <div class="d-flex flex-row-reverse">
                        @if ($notification->receiver_id == Auth::user()->id || has_permission('notification'))
                            <div class="p-2"><a data-item="{{ $notification }}"
                                    class="text-danger deleteButton">Delete</a>
                            </div>
                        @endif
                        <div class="p-2"><a href="{{ route('notification.view', ['id' => $notification->id]) }}">View
                                full notification</a></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Add Modal --}}
    @include('notification.add')

    {{-- Delete Modal --}}
    @include('notification.delete')
@stop


@section('scripts')
    <script>
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

            var notification = $(this).data('item');

            $('#deleteModalId').val(notification.id);
            $('#textBanModal').text('Are you sure you want to delete notification ' + notification.title +
                '? This notification can\'t be retrieved back after delete');
        });

        $(".closeDeleteModal").click(function() {
            $('#deleteModal').modal('hide');
        });
    </script>
@stop
