<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Add Class Programm</h5>

            </div>
            <form action="{{ route('admin.schedule.store') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="name" class="form-label fw-bold text-black">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="description" class="form-label fw-bold text-black">Description</label>
                            <input type="text" class="form-control" id="description" name="description"
                                value="{{ old('description') }}">
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="image" class="form-label fw-bold text-black">Image</label>
                            <input type="file" class="form-control" id="image" name="image"
                                value="{{ old('image') }}">

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
