<div class="modal fade" id="deleteTeamModal" tabindex="-1" role="dialog" aria-labelledby="deleteTeamModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('tournament.event.participant.delete') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteTeamModalLabel">
                        Delete Record
                    </h5>
                </div>
                <div class="modal-body">
                    <p id="warning"></p>
                    <input name="id" type="text" id="deleteTeamModalId" hidden>
                    <input name="tournament_id" type="text" value="{{ $tourney->id }}" hidden>
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
