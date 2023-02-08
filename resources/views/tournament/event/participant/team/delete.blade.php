<div class="modal fade" id="deleteTeamModal" tabindex="-1" role="dialog" aria-labelledby="deleteTeamModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteTeamModalLabel">
                        Delete Record
                    </h5>
                </div>
                <div class="modal-body">
                    <p id="textBanModal"></p>
                    <input name="id" type="text" id="deleteTeamModalId" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeDeleteTeamModal"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Confirm Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
