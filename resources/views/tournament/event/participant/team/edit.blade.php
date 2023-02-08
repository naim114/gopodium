<div class="modal fade" id="editTeamModal" tabindex="-1" role="dialog" aria-labelledby="editTeamModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTeamModalLabel">
                        Participant
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label>Team</label>
                        <select name="type" class="mt-2 form-control" required>
                            {{-- FOREACH HERE --}}
                            <option value="">TEAM NAME HERE</option>
                            {{-- FOREACH HERE --}}
                        </select>
                    </div>

                    <div class="form-group mb-2">
                        <label>Score</label>
                        <input type="number" class="form-control" placeholder="Enter score">
                    </div>

                    <div class="form-group mb-2">
                        <label>Notes</label>
                        <input type="text" class="form-control" placeholder="Enter note">
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
