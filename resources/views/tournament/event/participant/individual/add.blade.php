<div class="modal fade" id="addIndividualModal" tabindex="-1" role="dialog" aria-labelledby="addIndividualModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="">
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
                        <select name="type" class="mt-2 form-control" required>
                            {{-- FOREACH HERE --}}
                            <option value="">Individual Matchup</option>
                            {{-- FOREACH HERE --}}
                        </select>
                    </div>

                    <div class="form-group mb-2">
                        <label>Team</label>
                        <input type="text" class="form-control" placeholder="Enter team name" readonly>
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
