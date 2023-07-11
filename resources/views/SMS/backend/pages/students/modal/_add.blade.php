<div class="modal fade" id="import" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-maroon">
                <h5 class="modal-title text-white">Import Students</h5>

            </div>
            <form action="{{ route('admin.student.import') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="file" class="form-label fw-bold text-black">Select File</label>
                        <input type="file" name="file" class="form-control" id="file" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="submit-e" class="btn btn-maroon">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>
