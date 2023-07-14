<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-maroon">
                <h5 class="modal-title text-white">Add Specialization</h5>

            </div>
            <form action="{{ route('admin.maintenance.store') }}" method="POST">
                <div class="modal-body">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-5">
                            <label for="start_date" class="form-label fw-bold text-black">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date">
                            @error('start_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-5">
                            <label for="end_date" class="form-label fw-bold text-black">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date">
                            @error('end_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" id="submit-e" class="btn btn-maroon">Save Changes</button>
                    </div>

            </form>
        </div>
    </div>
</div>
