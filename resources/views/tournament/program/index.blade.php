@extends('layouts.dashboard-master')

@section('page-title', trans('app.tourney.program'))

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('tournament') }}">TOURNEY CODE HERE</a> /
    <a>{{ trans('app.tourney.program') }}</a>
@stop

@section('content')
    <div class="container">
        @include('tournament.partial.tab')
    </div>
@stop
