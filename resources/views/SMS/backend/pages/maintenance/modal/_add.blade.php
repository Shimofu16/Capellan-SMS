<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Add Fee</h5>

            </div>
            <form action="{{ route('admin.maintenance.store') }}" method="POST">
                <div class="modal-body">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-5">
                            <label for="fee" class="form-label fw-bold text-black">Fee</label>
                            <input type="number" class="form-control" id="fee" name="fee">
                            @error('fee')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <label for="isActive" class="form-label fw-bold text-black">Make this fee Active</label>
                            <select name="isActive" id="isActive" class="form-select">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            @error('fee')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" id="submit-e" class="btn btn-primary">Add</button>
                    </div>

            </form>
        </div>
    </div>
</div>
