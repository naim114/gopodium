<div class="modal fade" id="deleteItemModal" tabindex="-1" role="dialog" aria-labelledby="deleteItemModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('tournament.event.participant.item_delete') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteItemModalLabel">
                        Delete Athlete Name
                    </h5>
                </div>
                <div class="modal-body">
                    <p id="warningDeleteItem"></p>
                    <input name="id" type="text" id="deleteItemModalId" hidden>
                    <input name="tournament_id" type="text" value="{{ $tourney->id }}" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeDeleteItemModal"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Confirm Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
