<div class="modal fade" id="edit{{ $specialization->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Edit</h5>

            </div>
            <form action="{{ route('admin.academic.specialization.update', ['id' => $specialization->id]) }}"
                method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="name" class="form-label fw-bold text-black">specialization Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $specialization->name }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- generate a select for strands --}}
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="strand_id" class="form-label fw-bold text-black">Strand</label>
                            <select name="strand_id" id="strand_id" class="form-control">
                                <option value="">Select Strand</option>
                                @foreach ($strands as $strand)
                                    <option value="{{ $strand->id }}"
                                        @if ($strand->id == $specialization->strand_id) selected @endif>{{ $strand->name }}</option>
                                @endforeach
                            </select>
                            @error('strand_id')
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

