<div class="modal fade" id="editIndividualModal" tabindex="-1" role="dialog" aria-labelledby="editIndividualModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="">
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
                        <select name="type" class="mt-2 form-control" required>
                            {{-- FOREACH HERE --}}
                            <option value="">ATHLETE NAME HERE</option>
                            {{-- FOREACH HERE --}}
                        </select>
                    </div>

                    <div class="form-group mb-2">
                        <label>Team</label>
                        <input type="text" class="form-control" placeholder="Enter team name" readonly>
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
                    <button type="button" class="btn btn-secondary closeEditIndividualModal"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </form>
    </div>
</div>
