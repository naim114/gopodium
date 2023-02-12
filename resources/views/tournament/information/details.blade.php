<form method="POST" action="{{ route('tournament.edit.detail') }}">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label for="name">Tournament Name</label>
                <input type="text" name="name" value="{{ $tourney->name }}" class="form-control"
                    placeholder="Enter Tournament Name" required>
                <input type="text" name="id" value="{{ $tourney->id }}" hidden>
            </div>
            <div class="form-group mb-3">
                <label for="code">Tournament Code</label>
                <input type="text" name="code" value="{{ $tourney->code }}" class="form-control"
                    placeholder="Enter Tournament Code" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label for="organizer">Organizer</label>
                <input type="text" name="organizer" value="{{ $tourney->organizer }}" class="form-control"
                    placeholder="Enter Organizer">
            </div>
        </div>
    </div>
    <div class="d-flex flex-row-reverse">
        <button type="submit" class="btn btn-primary float-right">
            Update Details
        </button>
    </div>
</form>
