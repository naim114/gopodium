@extends('layouts.main')

@section('page-title', trans('app.tourney.standing'))

@section('content')
    <div style="height: 50px"></div>
    <section data-aos="fade-up">
        <div class="container">
            @include('main.tournament.tab')
            <table class="table table-striped table-hover table-responsive">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Team Name</th>
                        <th scope="col">Gold</th>
                        <th scope="col">Silver</th>
                        <th scope="col">Bronze</th>
                        <th scope="col">Total Point</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- TODO foreach here --}}
                    <tr>
                        {{-- <th scope="row">{{ $count++ }}</th> --}}
                        <th scope="row">1</th>
                        <td><a href="{{ route('main.tourney.team') }}">TEAM 1</a></td>
                        <td>2</td>
                        <td>5</td>
                        <td>3</td>
                        <td>10.00</td>
                    </tr>
                    {{-- TODO foreach till here --}}
                </tbody>
            </table>
        </div>
    </section>
@endsection
