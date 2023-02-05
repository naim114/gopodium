<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">
                        Request Add Tournament
                    </h5>
                </div>
                <div class="modal-body">
                    <p>
                        <b>
                            REMINDER:
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper tellus ut lorem
                            volutpat, in tempus diam auctor. Aenean sed felis ac lacus mollis vestibulum. Duis eleifend
                            commodo neque, vel sodales velit posuere in. Sed erat quam, elementum vel neque sit amet,
                            viverra ultricies ante.
                        </b>
                    </p>
                    <div class="form-group mb-2">
                        <label>Tournament Name</label>
                        <input name="name" type="text" class="form-control" placeholder="Enter tournament name">
                    </div>
                    <div class="form-group mb-2">
                        <label>Tournament Code</label>
                        <input name="code" type="text" class="form-control" placeholder="Enter tournament code">
                    </div>
                    <div class="form-group mb-2">
                        <label>Tournament Type</label>
                        <select name="type" class="mt-2 form-control" required>
                            {{-- Foreach here --}}
                            <option value="">Type Name</option>
                            {{-- Foreach till here --}}
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Start Date</label>
                        <input name="start_at" type="date" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label>Duration</label>
                        <input name="duration" type="number" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeAddModal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send Request</button>
                </div>
            </div>
        </form>
    </div>
</div>
