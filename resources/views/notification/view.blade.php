@extends('layouts.dashboard-master')

@section('page-title', trans('app.notification'))

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('notification') }}">{{ trans('app.notification') }}</a> /
    <a href="{{ route('notification') }}">View</a> /
    <a>TITLE HERE</a>
@stop

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header">
                <h5><b>Welcome!</b></h5>
            </div>
            <div class="card-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi consectetur, sem
                    in vestibulum
                    posuere,
                    dolor ipsum scelerisque justo, sit amet mattis felis neque quis lacus. Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit. Morbi consectetur, sem in vestibulum posuere, dolor ipsum scelerisque
                    justo, sit amet mattis felis neque quis lacus.</p>
            </div>
            <div class="card-footer">
                <div class="d-flex flex-row-reverse">
                    <div class="p-2"><a href="" class="text-danger">Delete</a></div>
                    <div class="p-2"><a href="">Mark as unread</a></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
@stop
