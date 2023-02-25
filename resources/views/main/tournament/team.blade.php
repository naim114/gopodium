@extends('layouts.main')

@section('page-title', 'TEAM NAME HERE')

@section('content')
    <div style="height: 50px"></div>
    <section data-aos="fade-up">
        <div class="container mb-4">
            <div class="d-flex flex-row align-items-center">
                <img id="preview" class="img-thumbnail" style="height: 150px; width: 150px"
                    src="{{ asset('assets/img/default-team.png') }}">
                <div class="col" style="margin-left: 20px">
                    <h1>TEAM NAME HERE</h1>
                    <p><b>
                            Team Code Here<br>
                        </b></p>
                </div>
            </div>

            <table class="table table-striped table-hover table-responsive">
                <thead class="thead-dark">
                    <tr class="align-middle">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- TODO foreach here --}}
                    <tr class="align-middle">
                        {{-- <th scope="row">{{ $count++ }}</th> --}}
                        <th scope="row">1</th>
                        <td><a href="{{ route('main.tourney.athlete') }}">ATHLETE NAME</a></td>
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
