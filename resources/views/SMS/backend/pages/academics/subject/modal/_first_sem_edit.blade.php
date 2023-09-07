<div class="modal fade" id="edit{{ $firstSemSubject->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Edit</h5>

            </div>
            <form action="{{ route('admin.academic.subject.update', ['id' => $firstSemSubject->id]) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="code" class="form-label fw-bold text-black">Code</label>
                            <input type="text" class="form-control" id="code" name="code"
                                value="{{ $firstSemSubject->code }}">
                            @error('code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="name" class="form-label fw-bold text-black">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $firstSemSubject->name }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="unit" class="form-label fw-bold text-black">Unit</label>
                            <input type="number" class="form-control" id="unit" name="unit"
                                value="{{ $firstSemSubject->unit }}">
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
                                <option value="Core" @if ($firstSemSubject->type == 'Core') selected @endif>Core</option>
                                <option value="Applied and Specialized Subjects" @if ($firstSemSubject->type == 'Applied and Specialized Subjects') selected @endif>Applied and Specialized Subjects
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
                                        @if ($gradLevel->id == $firstSemSubject->grade_level_id) selected @endif>
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
                                        @if ($specialization->id == $firstSemSubject->specialization_id) selected @endif>
                                        {{ $specialization->specialization }}
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
                                        @if ($semester->id == $firstSemSubject->semester_id) selected @endif>{{ $semester->sem }}
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
                    <button type="submit" id="submit-e" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
