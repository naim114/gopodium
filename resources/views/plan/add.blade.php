<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('plan.add') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">
                        Add Plan
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label>Display name</label>
                        <input name="name" type="text" class="form-control" placeholder="Enter display name"
                            required>
                    </div>
                    <div class="form-group mb-2">
                        <label>Price (RM)</label>
                        <input name="price" type="number" class="form-control" step=".01"
                            placeholder="Enter price (number only)" required>
                    </div>
                    <hr>
                    <div class="form-group mb-2">
                        <label>Team Limit</label>
                        <input name="team_limit" type="number" class="form-control"
                            placeholder="Enter number of teams allowed" required>
                    </div>
                    <div class="form-group mb-2">
                        <label>Athlete per Team Limit</label>
                        <input name="athlete_limit" type="number" class="form-control"
                            placeholder="Enter number of athletes per team allowed" required>
                    </div>
                    <div class="form-group mb-2">
                        <label>Event Limit</label>
                        <input name="event_limit" type="number" class="form-control"
                            placeholder="Enter number of events allowed" required>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="invite">
                        <label class="form-check-label" for="defaultCheck1">
                            Team Managers Invite
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="personalization">
                        <label class="form-check-label" for="defaultCheck1">
                            Personalization
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeAddModal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
