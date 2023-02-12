<form method="POST" action="{{ route('tournament.edit.rule') }}">
    @csrf
    <div class="col">
        <div class="form-group mb-3">
            <label>How many individual
                events an athlete can join?</label>
            <input type="number" name="athlete_individual_event_limit"
                value="{{ $tourney->athlete_individual_event_limit }}" class="form-control">
            <input type="text" name="id" value="{{ $tourney->id }}" hidden>
        </div>
        <div class="form-group mb-3">
            <label>How many team events an athlete can join?</label>
            <input type="number" name="athlete_team_event_limit" value="{{ $tourney->athlete_team_event_limit }}"
                class="form-control">
        </div>
        <div class="form-group mb-3">
            <label>Standing Type</label>
            <select name="standing_type_id" class="mt-2 form-control" required>
                @foreach ($standings as $standing)
                    <option value="{{ $standing->id }}"
                        {{ $standing->id == $tourney->standing_type_id ? 'selected' : '' }}>
                        {{ $standing->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Gold Medal Point (1st Place)</label>
            <input type="number" name="first_place_point" value="{{ $tourney->first_place_point }}"
                class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Silver Medal Point (2nd Place)</label>
            <input type="number" name="second_place_point" value="{{ $tourney->second_place_point }}"
                class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Bronze Medal Point (3rd Place)</label>
            <input type="number" name="third_place_point" value="{{ $tourney->third_place_point }}"
                class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>4th Place</label>
            <input type="number" name="fourth_place_point" value="{{ $tourney->fourth_place_point }}"
                class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>5th Place</label>
            <input type="number" name="fifth_place_point" value="{{ $tourney->fifth_place_point }}"
                class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>6th Place</label>
            <input type="number" name="sixth_place_point" value="{{ $tourney->sixth_place_point }}"
                class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>7th Place</label>
            <input type="number" name="seventh_place_point" value="{{ $tourney->seventh_place_point }}"
                class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>8th Place</label>
            <input type="number" name="eigth_place_point" value="{{ $tourney->eigth_place_point }}"
                class="form-control">
        </div>
    </div>
    <div class="d-flex flex-row-reverse mb-3">
        <button type="submit" class="btn btn-primary float-right">
            Update Rules
        </button>
    </div>
</form>
