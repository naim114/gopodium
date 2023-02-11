@extends('layouts.dashboard-master')

@section('page-title', trans('app.notification'))

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('notification') }}">{{ trans('app.notification') }}</a> /
    <a href="{{ route('notification') }}">View</a> /
    <a>{{ $notification->title }}</a>
@stop

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header">
                <h5>{{ $notification->title }}</h5>
            </div>
            <div class="card-body">
                <p>{!! $notification->msg !!}</p>
            </div>
            <div class="card-footer">
                <div class="d-flex flex-row-reverse">
                    <div class="p-2"><a data-item="{{ $notification }}" class="text-danger deleteButton">Delete</a></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    @include('notification.delete')
@stop

@section('scripts')
    <script>
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
