<div class="modal fade" id="editIndividualModal" tabindex="-1" role="dialog" aria-labelledby="editIndividualModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('tournament.event.participant.manage') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editIndividualModalLabel">
                        Participant
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label>Athlete</label>
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

                    <div class="form-group mb-2">
                        <label>Score</label>
                        <input id="id" name="id" type="text" hidden>
                        <input id="score" name="score" type="number" step="0.001" class="form-control"
                            placeholder="Enter score">
                        <input name="event_id" type="text" value="{{ $event->id }}" hidden>
                        <input name="tournament_id" type="text" value="{{ $tourney->id }}" hidden>
                    </div>

                    <div class="form-group mb-2">
                        <label>Notes</label>
                        <input id="note" name="note" type="text" class="form-control"
                            placeholder="Enter note">
                    </div>

                    @if ($event->championship == true)
                        @if ($event->event_type->name == 'Individual Matchup' || $event->event_type->name == 'Team Matchup')
                            <div class="form-group mb-2">
                                <label>Position</label>
                                <select id="position" name="position" class="mt-2 form-control" required>
                                    <option value=" ">Place a position</option>
                                    <option value="1">1st (Gold Medal)</option>
                                    <option value="2">2nd (Silver Medal)</option>
                                    <option value="3">3rd (Bronze Medal)</option>
                                    <option value="4">4th</option>
                                    <option value="5">5th</option>
                                    <option value="6">6th</option>
                                    <option value="7">7th</option>
                                    <option value="8">8th</option>
                                </select>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeEditIndividualModal"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </form>
    </div>
</div>
