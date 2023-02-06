<div class="col-md-6">
    <div class="form-group mb-3">
        <label for="name">Registered at</label>
        <input type="text" name="name" value="" class="form-control" readonly>
    </div>
    <div class="form-group mb-3">
        <label for="code">Start Date</label>
        <input type="date" name="start_at" value="" class="form-control" placeholder="Enter Start Date">
    </div>
    <div class="form-group mb-3">
        <label for="code">End Date</label>
        <input type="date" value="" class="form-control" placeholder="End Date" readonly>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group mb-3">
        <label for="organizer">Duration</label>
        <input type="number" name="duration" value="" class="form-control" placeholder="Enter Duration">
    </div>
    <div class="form-group mb-3">
        <label for="organizer">Tournament Type</label>
        <select name="type" class="mt-2 form-control" required>
            {{-- Foreach here --}}
            <option value="">Type Name</option>
            {{-- Foreach till here --}}
        </select>
    </div>
</div>
<div class="d-flex flex-row-reverse mb-3">
    <button type="submit" class="btn btn-primary float-right">
        Update Registration Record {{-- TODO w/ permission only --}}
    </button>
</div>
