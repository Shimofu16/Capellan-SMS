<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-maroon">
                <h5 class="modal-title text-white">Add Specialization</h5>

            </div>
            <form action="{{ route('admin.academic.specialization.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="name" class="form-label fw-bold text-black">Specialization Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="strand_id" class="form-label fw-bold text-black">Strand</label>
                            <select name="strand_id" id="strand_id" class="form-select">
                                <option value="">Select Strand</option>
                                @foreach ($strands as $strand)
                                    <option value="{{ $strand->id }}">{{ $strand->name }}</option>
                                @endforeach
                            </select>
                            @error('strand_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="submit-e" class="btn btn-maroon">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>