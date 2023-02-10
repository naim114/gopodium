@extends('layouts.main')

@section('page-title', 'EVENT NAME HERE')

@section('content')
    <div style="height: 50px"></div>
    <section data-aos="fade-up">
        <div class="container">
            <h1>EVENT NAME HERE</h1>
            <div class="card mb-3" style="background-color: #f7f7f7">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><b>Code:</b>{{ '' }}</p>
                            <p><b>Category:</b>{{ '' }}</p>
                            <p><b>Round:</b>{{ '' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><b>Type:</b>{{ '' }}</p>
                            <p><b>Date:</b>{{ '' }}</p>
                            <p><b>Time:</b>{{ '' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Individual --}}
            {{-- Indivudal Matchup --}}
            @if (true)
                @include('main.partial.individual.matchup')
            @endif

            {{-- Indivudal Heat --}}
            @if (true)
                @include('main.partial.individual.heat')
            @endif

            {{-- Team --}}
            {{-- Team Matchup --}}
            @if (false)
                @include('main.partial.team.matchup')
            @endif

            {{-- Team Heat --}}
            @if (false)
                @include('main.partial.team.heat')
            @endif
        </div>
    </section>
@endsection
