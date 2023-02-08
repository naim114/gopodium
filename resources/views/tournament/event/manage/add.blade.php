<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" action="">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">
                        Add Event
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <p class="text-decoration-underline"><b>Event Details</b></p>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label>Event Name</label>
                                <input name="name" type="text" class="form-control"
                                    placeholder="Enter event name">
                            </div>
                            <div class="form-group mb-2">
                                <label>Code</label>
                                <input name="category" type="text" class="form-control"
                                    placeholder="Enter event code">
                            </div>
                            <div class="form-group mb-2">
                                <label>Category</label>
                                <input name="category" type="text" class="form-control" placeholder="Enter category">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label>Round</label>
                                <input name="category" type="text" class="form-control" placeholder="Enter category">
                            </div>
                            <div class="form-group mb-2">
                                <label>Type</label>
                                <select name="type" class="mt-2 form-control" required>
                                    <option value="">Individual Matchup</option>
                                    <option value="">Team Matchup</option>
                                    <option value="">Individual Heat</option>
                                    <option value="">Team Heat</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label>Date & Time</label>
                                <input name="datetime" type="datetime-local" class="form-control"
                                    placeholder="Enter category">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <p class="text-decoration-underline"><b>Rules</b></p>
                            <div class="form-group mb-2">
                                <label>How many athletes per team allowed?</label>
                                <input name="category" type="number" class="form-control"
                                    placeholder="Enter number of athletes">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeAddModal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </form>
    </div>
</div>
