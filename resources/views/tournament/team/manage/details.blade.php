<form method="POST" action="{{ route('tournament.team.edit.detail') }}">
    @csrf
    <div class="form-group mb-3">
        <label for="name">Team Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Team Name" value="{{ $team->name }}"
            required>
        <input type="text" value="{{ $team->id }}" name="id" class="form-control" hidden>
    </div>
    <div class="form-group mb-3">
        <label for="category">Category</label>
        <input type="text" name="category" class="form-control" placeholder="Enter Category"
            value="{{ $team->category }}" required>
    </div>
    <div class="d-flex flex-row-reverse">
        <button type="submit" class="btn btn-primary float-right">
            Update Details
        </button>
    </div>
</form>
