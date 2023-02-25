@extends('layouts.main')

@section('page-title', trans('app.tourneys'))

@section('content')
    <div style="height: 50px"></div>
    <section data-aos="fade-up">
        <div class="container">
            <div class="section-title">
                <h2>Tournaments</h2>
                <p>Search for tournaments here to view schedule, result, teams and many more.</p>
            </div>

            <div class="container">
                <table class="table table-striped table-hover table-responsive">
                    <thead class="thead-dark">
                        <tr class="align-middle">
                            <th scope="col">Name</th>
                            <th scope="col">Code</th>
                            <th scope="col">Registered at</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- TODO foreach here --}}
                        <tr class="align-middle">
                            <td><a href="{{ route('main.tourney.event') }}">TOURNAMENT 1</a></td>
                            <td>MMSM2020</td>
                            <td>1/2/2023 10.34 a.m</td>
                            <td>2/2/2023 12.00 p.m</td>
                            <td>5/2/2023 12.00 p.m</td>
                        </tr>
                        {{-- TODO foreach till here --}}
                    </tbody>
                </table>
            </div>
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
