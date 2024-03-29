@extends('layouts.main')

@section('page-title', trans('app.tourney.result'))

@section('content')
    <div style="height: 50px"></div>
    <section data-aos="fade-up">
        <div class="container">
            @include('main.tournament.tab')

            <table class="table table-striped table-hover table-responsive">
                <thead class="thead-dark">
                    <tr class="align-middle">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Code</th>
                        <th scope="col">Category</th>
                        <th scope="col">Round</th>
                        <th scope="col">Type</th>
                        <th scope="col">Date & Time</th>
                        <th scope="col">Result</th>
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
                        <td>2/3/2023 3.45 p.m.</td>
                        <td><a href="{{ route('main.tourney.event_result') }}">View</a></td>
                    </tr>
                    {{-- TODO foreach till here --}}
                </tbody>
            </table>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        });
    </script>
@endsection
