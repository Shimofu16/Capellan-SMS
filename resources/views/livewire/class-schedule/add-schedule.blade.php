<div>
    <form wire:submit.prevent="save">
        <div class="modal-body">
            @csrf
            <div class="row mb-3">
                <div class="col-12">
                    <label for="specialization_id" class="form-label fw-bold text-black">Specialization</label>
                    <select class="form-select" name="specialization_id" id="specialization_id"
                        wire:model='specialization_id'>
                        <option value="">Select a specialization</option>
                        @foreach ($specializations as $specialization)
                            <option value="{{ $specialization->id }}">{{ $specialization->specialization }}</option>
                        @endforeach
                    </select>
                    @error('specialization_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <label class="form-label fw-bold text-black" for="semester_id">Semester</label>
                    <select class="form-select @error('semester_id') is-invalid @enderror" id="semester_id"
                        name="semester_id" wire:model='semester_id' required>
                        <option selected value="">----- Select Semester -----</option>
                        @foreach ($semesters as $semester)
                            <option value="{{ $semester->id }}">{{ $semester->sem }}</option>
                        @endforeach
                    </select>
                    @error('semester_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <label class="form-label fw-bold text-black" for="subject_id">Subject</label>
                    <select class="form-select @error('subject_id') is-invalid @enderror" id="subject_id"
                        name="subject_id" wire:model='subject_id' required>
                        <option selected value="">----- Select Subject -----</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                    @error('subject_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <label for="teacher_id" class="form-label fw-bold text-black">Teacher</label>
                    <select class="form-select" name="teacher_id" id="teacher_id" wire:model="teacher_id">
                        <option value="">Select a teacher</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                    @error('teacher_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="form-group">
                    <label class="form-label fw-bold text-black" for="section_id">Section</label>
                    <select class="form-select" id="section_id" name="section_id" wire:model='section_id' required>
                        <option selected value="">-- Select Section --</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}">
                                {{ $section->section }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-5">
                    <label class="form-label fw-bold text-black" for="day">Day</label>
                    <select class="form-select @error('selected_day') is-invalid @enderror" id="selected_day" name="selected_day"
                        wire:model='selected_day' required>
                        <option selected value="">-- Select Day --</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="All">All</option>
                    </select>
                    @error('selected_day')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-7">
                    <div class="p-1">
                        @forelse ($days as $i => $day)
                            <button class="badge bg-primary border-0 mx-1" type="button"
                                wire:click='removeDay({{ $i }})'>{{ $day }}</button>
                        @empty
                            <div class="d-flex justify-content-center align-items-center">
                                <span>Select Day.</span>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label fw-bold text-black" for="start_time">Start</label>
                        <input type="time" class="form-control" id="start_time" name="start_time" wire:model='start_time'>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label fw-bold text-black" for="end_time">End</label>
                        <input type="time" class="form-control" id="end_time" name="end_time" wire:model="end_time">
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" id="submit-e" class="btn btn-primary">Add</button>
        </div>
    </form>
</div>
