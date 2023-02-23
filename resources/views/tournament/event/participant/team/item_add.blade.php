<div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('tournament.event.participant.item_add') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addItemModalLabel">
                        Add Athlete Name
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label>Athlete</label>
                        <input id="p" name="participant_id" type="text" hidden>
                        <input name="tournament_id" type="text" value="{{ $tourney->id }}" hidden>
                        <select id="athletes" name="athlete_id" class="teamAthlete selectpicker mt-2 form-control"
                            data-live-search="true" required>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeAddItemModal"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </form>
    </div>
</div>
