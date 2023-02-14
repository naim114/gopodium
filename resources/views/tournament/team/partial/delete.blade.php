<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('tournament.team.delete') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">
                        Delete Team
                    </h5>
                </div>
                <div class="modal-body">
                    <p id="warning" class="text-justify" style="font-weight: bold"></p>
                    <div class="form-group mb-2">
                        <label>Team Name</label>
                        <input id="del_text" type="text" class="form-control" placeholder="Enter team name">
                        <input id="del_name" type="text" hidden>
                        <input id="del_id" name="id" type="text" hidden>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeDeleteModal"
                        data-dismiss="modal">Close</button>
                    <button type="submit" id="submit" class="btn btn-danger" disabled>Confirm Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
