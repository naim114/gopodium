@extends('layouts.dashboard-master')

@section('page-title', trans('app.payment'))

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('payment') }}">{{ trans('app.payment') }}</a> /
    <a>View</a>
@stop

@section('content')
    <div class="container">
        <table class="table table-striped table-hover table-responsive">
            <thead class="thead-dark">
                <tr class="align-middle">
                    <th scope="col">#</th>
                    <th scope="col">Payment Type</th>
                    <th scope="col">Create at</th>
                    <th scope="col">File</th>
                </tr>
            </thead>
            <tbody>
                {{-- TODO foreach here --}}
                <tr class="align-middle">
                    {{-- <th scope="row">{{ $count++ }}</th> --}}
                    <th scope="row">1</th>
                    <td>Rookie Plan</td>
                    <td>10/10/10 10.00 a.m.</td>
                    <td><a href="">View</a></td>
                </tr>
                {{-- TODO foreach till here --}}
            </tbody>
        </table>
    </div>
@stop
