<div class="modal fade" id="inviteModal" tabindex="-1" role="dialog" aria-labelledby="inviteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inviteModalLabel">
                        Invite Manager
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label>Manager username</label>
                        <input name="name" type="text" class="form-control"
                            placeholder="Enter manager username to invite as managers">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeInviteModal"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Invite</button>
                </div>
            </div>
        </form>
    </div>
</div>
