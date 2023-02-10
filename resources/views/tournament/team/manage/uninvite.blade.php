<div class="modal fade" id="uninviteModal" tabindex="-1" role="dialog" aria-labelledby="uninviteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uninviteModalLabel">
                        Uninvite Manager
                    </h5>
                </div>
                <div class="modal-body">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeUninviteModal"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Uninvite</button>
                </div>
            </div>
        </form>
    </div>
</div>
