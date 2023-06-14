<div class="modal fade" id="edit{{ $sy->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Edit SY</h5>

            </div>
            <form action="{{ route('admin.maintenance.update', ['table' => 'sy','id' => $sy->id]) }}"
                method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-5">
                            <label for="start_date" class="form-label fw-bold text-black">Start Date</label>
                            <input type="text" class="form-control" id="start_date" name="start_date"
                                value="{{ $sy->start_date }}">
                            @error('start_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-5">
                            <label for="end_date" class="form-label fw-bold text-black">End Date</label>
                            <input type="text" class="form-control" id="end_date" name="end_date"
                                value="{{ $sy->end_date }}">
                            @error('end_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- generate a select for strands --}}
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="semester_id" class="form-label fw-bold text-black">Semester</label>
                            <select name="semester_id" id="semester_id" class="form-control">
                                <option value="">Select Semester</option>
                                @foreach ($semesters as $semester)
                                    <option value="{{ $semester->id }}"
                                        @if ($semester->id == $sy->semester_id) selected @endif>{{ $semester->name }}</option>
                                @endforeach
                            </select>
                            @error('semester_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="is_active" class="form-label fw-bold text-black">Current SY</label>
                            <select name="is_active" id="is_active" class="form-control">
                                <option value="">Make SY:{{ $sy->name }} as Default</option>
                                    <option value="true"
                                        @if ($sy->is_active == true) selected @endif>Yes</option>
                                    <option value="false"
                                        @if ($sy->is_active == false) selected @endif>No</option>
                            </select>
                            @error('is_active')
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
