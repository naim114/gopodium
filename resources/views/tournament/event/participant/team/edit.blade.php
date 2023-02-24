<div class="modal fade" id="editTeamModal" tabindex="-1" role="dialog" aria-labelledby="editTeamModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('tournament.event.participant.manage') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTeamModalLabel">
                        Participant
                    </h5>
                </div>
                <div class="modal-body">
                    <p>WARNING: Once you change team, associated athlete record will be deleted.</p>

                    <div class="form-group mb-2">
                        <label>Team</label>
                        <select id="team" name="team_id" class="mt-2 form-control" required>
                            <option value="">Select a team</option>
                            @foreach ($tourney->team as $team)
                                <option value="{{ $team->id }}">
                                    {{ $team->name }}
                                </option>
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
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeEditTeamModal"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </form>
    </div>
</div>
