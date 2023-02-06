<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">
                        Delete Teamx
                    </h5>
                </div>
                <div class="modal-body">
                    <p>
                        <b>
                            WARNING:
                            Are you sure you want to delete {{ 'TEAM NAME HERE' }}? All athlete and event this team
                            participated recommended to be delete first. Type the team name and click Confirm Delete to
                            confirm team deletion.
                        </b>
                    </p>
                    <div class="form-group mb-2">
                        <label>Team Name</label>
                        <input name="name" type="text" class="form-control" placeholder="Enter tournament name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeDeleteModal"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" disabled>Confirm Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
