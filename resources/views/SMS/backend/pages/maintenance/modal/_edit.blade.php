<div class="modal fade" id="edit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Edit Fee</h5>

            </div>
            <form action="{{ route('admin.maintenance.update', ['table' => 'billing','id' => $billing->id]) }}"
                method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="fee" class="form-label fw-bold text-black">Fee</label>
                            <input type="text" class="form-control" id="fee" name="fee"
                                value="{{ $billing->fee }}">
                            @error('fee')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" id="submit-e" class="btn btn-primary">Save Changes</button>
                    </div>
            </form>
        </div>
    </div>
</div>
