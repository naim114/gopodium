@extends('layouts.main')

@section('page-title', trans('app.tourney.schedule'))

@section('content')
    <div style="height: 50px"></div>
    <section data-aos="fade-up">
        <div class="container">
            @include('main.tournament.tab')

            <h5>Saturday, 5 December 2022</h5>
            <table class="table table-striped table-hover table-responsive">
                <thead class="thead-dark">
                    <tr class="align-middle">
                        <th scope="col">#</th>
                        <th scope="col">Event</th>
                        <th scope="col">Code</th>
                        <th scope="col">Category</th>
                        <th scope="col">Round</th>
                        <th scope="col">Type</th>
                        <th scope="col">Time</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- TODO foreach here --}}
                    <tr class="align-middle">
                        {{-- <th scope="row">{{ $count++ }}</th> --}}
                        <th scope="row">1</th>
                        <td><a href="{{ route('main.tourney.event_result') }}">EVENT NAME</a></td>
                        <td>EVE001</td>
                        <td>L</td>
                        <td>Final</td>
                        <td>Individual Matchup</td>
                        <td>3.45 p.m.</td>
                    </tr>
                    {{-- TODO foreach till here --}}
                </tbody>
            </table>
        </div>
    </section>
@endsection
