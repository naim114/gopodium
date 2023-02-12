<div class="col-md-6">
    <div class="form-group mb-3">
        <label>Registered at</label>
        <input type="text" value="{{ $tourney->created_at->format('d/m/Y H:i:s') }}" class="form-control" readonly>
    </div>
    <div class="form-group mb-3">
        <label>Plan Name</label>
        <input type="text" value="{{ $tourney->name }}" class="form-control" readonly>
    </div>
    <div class="form-group mb-3">
        <label for="organizer">Duration</label>
        <input type="text" value="{{ $tourney->duration }}" class="form-control" readonly>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group mb-3">
        <label for="code">Start Date</label>
        <input type="text" value="{{ $tourney->start_at->format('d/m/Y') }}" class="form-control" readonly>
    </div>
    <div class="form-group mb-3">
        <label for="code">End Date</label>
        <input type="text" value="{{ $tourney->end_at->format('d/m/Y') }}" class="form-control" readonly>
    </div>
    <div class="form-group mb-3">
        <label for="organizer">Tournament Type</label>
        <input type="text" value="{{ $tourney->type }}" class="form-control" readonly>
    </div>
</div>
