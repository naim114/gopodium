<div class="modal fade" id="addIndividualModal" tabindex="-1" role="dialog" aria-labelledby="addIndividualModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('tournament.event.participant.manage') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addIndividualModalLabel">
                        Participant
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label>Athlete</label>
                        <input name="event_id" type="text" value="{{ $event->id }}" hidden>
                        <input name="tournament_id" type="text" value="{{ $tourney->id }}" hidden>
                        <select name="athlete_id" class="individualAthlete selectpicker mt-2 form-control"
                            data-live-search="true" required>
                            <option value="">Select an athlete</option>
                            @foreach ($tourney->team as $team)
                                <optgroup label="{{ $team->name }}">
                                    @foreach ($team->athlete as $athlete)
                                        <option value="{{ $athlete->id }}">
                                            {{ $athlete->name . ' (' . $team->name . ')' }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeAddIndividualModal"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </form>
    </div>
</div>
