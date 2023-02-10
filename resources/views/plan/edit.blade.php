<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('plan.edit') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">
                        Edit Plan
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label>Display name</label>
                        <input id="name" name="name" type="text" class="form-control"
                            placeholder="Enter display name">
                        <input id="id" name="id" type="text" hidden>
                    </div>
                    <div class="form-group mb-2">
                        <label>Price (RM)</label>
                        <input id="price" name="price" type="number" class="form-control" step=".01"
                            placeholder="Enter price (number only)">
                    </div>
                    <hr>
                    <div class="form-group mb-2">
                        <label>Team Limit</label>
                        <input id="team_limit" name="team_limit" type="number" class="form-control"
                            placeholder="Enter number of teams allowed">
                    </div>
                    <div class="form-group mb-2">
                        <label>Athlete per Team Limit</label>
                        <input id="athlete_limit" name="athlete_limit" type="number" class="form-control"
                            placeholder="Enter number of athletes per team allowed">
                    </div>
                    <div class="form-group mb-2">
                        <label>Event Limit</label>
                        <input id="event_limit" name="event_limit" type="number" class="form-control"
                            placeholder="Enter number of events allowed">
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="invite" name="invite">
                        <label class="form-check-label" for="defaultCheck1">
                            Team Managers Invite
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="personalization" name="personalization">
                        <label class="form-check-label" for="defaultCheck1">
                            Personalization
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeEditModal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
