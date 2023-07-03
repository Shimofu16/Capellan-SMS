<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-maroon">
                <h5 class="modal-title text-white">Add Subject</h5>

            </div>
            <form action="{{ route('admin.academic.subject.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="code" class="form-label fw-bold text-black">Code</label>
                            <input type="text" class="form-control" id="code" name="code"
                                value="{{ old('code') }}">
                            @error('code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
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
                            <label for="unit" class="form-label fw-bold text-black">Unit</label>
                            <input type="number" class="form-control" id="unit" name="unit"
                                value="{{ old('unit') }}">
                            @error('unit')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="type" class="form-label fw-bold text-black">Type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="">Select type</option>
                                <option value="Core" @if (old('type') == 'Core') selected @endif>Core</option>
                                <option value="Applied and Specialized Subjects"
                                    @if (old('type') == 'Applied and Specialized Subjects') selected @endif>Applied and Specialized Subjects
                                </option>
                            </select>
                            @error('type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="grade_level_id" class="form-label fw-bold text-black">Grade Level</label>
                            <select name="grade_level_id" id="grade_level_id" class="form-control">
                                <option value="">Select grade level</option>
                                @foreach ($gradeLevels as $gradLevel)
                                    <option value="{{ $gradLevel->id }}"
                                        @if ($gradLevel->id == old('grade_lavel_id')) selected @endif>
                                        {{ $gradLevel->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('specialization_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="specialization_id" class="form-label fw-bold text-black">Specialization</label>
                            <select name="specialization_id" id="specialization_id" class="form-control">
                                <option value="">Select specialization</option>
                                @foreach ($specializations as $specialization)
                                    <option value="{{ $specialization->id }}"
                                        @if ($specialization->id == old('specialization_id')) selected @endif>
                                        {{ $specialization->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('specialization_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="semester_id" class="form-label fw-bold text-black">Semester</label>
                            <select name="semester_id" id="semester_id" class="form-control">
                                <option value="">Select semester</option>
                                @foreach ($semesters as $semester)
                                    <option value="{{ $semester->id }}"
                                        @if ($semester->id == old('semester_id')) selected @endif>{{ $semester->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('semester_id')
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
