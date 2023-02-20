<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('tournament.event.delete') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">
                        Delete Event
                    </h5>
                </div>
                <div class="modal-body">
                    <p id="warning" style="font-weight: bold"></p>
                    <div class="form-group mb-2">
                        <label>Event Name</label>
                        <input id="del_text" type="text" class="form-control" placeholder="Enter event name">
                        <input id="del_name" type="text" hidden>
                        <input class="event_id" name="id" type="text" hidden>
                        <input class="tournament_id" name="tournament_id" type="text" hidden>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeDeleteModal"
                        data-dismiss="modal">Close</button>
                    <button id="submit" type="submit" class="btn btn-danger" disabled>Confirm Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
