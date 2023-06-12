<div class="modal fade" id="edit{{ $strand->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Edit</h5>

            </div>
            <form action="{{ route('admin.academic.strand.update',['id' => $strand->id]) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="name" class="form-label fw-bold text-black">Strand Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $strand->name }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="slug" class="form-label fw-bold text-black">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug"
                                value="{{ $strand->slug }}">
                            @error('slug')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
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
