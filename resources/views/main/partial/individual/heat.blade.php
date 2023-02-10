<table class="table table-striped table-hover table-responsive">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Athlete</th>
            <th scope="col">Team</th>
            <th scope="col">Score</th>
            <th scope="col">Notes</th>
        </tr>
    </thead>
    <tbody>
        {{-- TODO foreach here --}}
        <tr>
            {{-- <th scope="row">{{ $count++ }}</th> --}}
            <th scope="row">1</th>
            <td>ATHLETE</td>
            <td><a href="{{ route('main.tourney.team') }}">TEAM</a></td>
            <td>1.00</td>
            <td>Q</td>
        </tr>
        {{-- TODO foreach till here --}}
    </tbody>
</table>
