<div class="card-body">
    <div class="row align-items-end">
        {{-- generate a livewire select for grade levels --}}
        <div class="col-md-3">
            <div class="mb-3">
                <label for="gradeLevel" class="form-label">Grade Level</label>
                <select wire:model="grade_level_id" class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    @foreach ($gradeLevels as $level)
                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select wire:model="status" class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="Regular">Regular</option>
                    <option value="Transferee">Transferee</option>
                    <option value="Iregular">Iregular</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">

        <form action="{{ route('admin.student.store', ['student_id' => $student->id, 'grade_level_id' => $grade_level_id, 'status' => $status]) }}" method="POST">
            @csrf
            <h4 class="text-center">First Semester</h4>
            <table class="table" id="subjects-table">
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject</th>
                        @if ($status == 'Regular' || $status === 'Transferee')
                            <th>Enroll Subject</th>
                        @elseif ($status == 'Iregular')
                            <th>Completed Subject</th>
                            <th>Enroll Subject</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6" class="text-center">
                            <h5>Core</h5>
                        </td>
                    </tr>
                    @forelse ($subjectsForFirstSemGrade11Core as $subjectForFirstSemGrade11Core)
                        <tr>
                            <td>{{ $subjectForFirstSemGrade11Core->code }}</td>
                            <td>{{ $subjectForFirstSemGrade11Core->name }}</td>
                            @if ($status === 'Regular' || $status === 'Transferee')
                                <td>
                                    <input type="checkbox" name="enroll_subjects[]" {{ ($status === "Regular") ? 'checked': '' }} 
                                        value="{{ $subjectForFirstSemGrade11Core->id }}">
                                </td>
                            @endif
                            @if ($status === 'Iregular')
                                <td>
                                    <input type="checkbox" name="completed_subjects[]"
                                        value="{{ $subjectForFirstSemGrade11Core->id }}">
                                </td>
                                <td>
                                    <input type="checkbox" name="enroll_subjects[]"
                                        value="{{ $subjectForFirstSemGrade11Core->id }}">
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No Core Subjects Found</td>
                        </tr>
                    @endforelse
                    <tr>
                        <td colspan="6" class="text-center">
                            <h5>Applied and Specialized Subjects</h5>
                        </td>
                    </tr>
                    @forelse ($subjectsForFirstSemGrade11AppliedSpecializedSubjects as $subjectForFirstSemGrade11AppliedSpecializedSubjects)
                        <tr>
                            <td>{{ $subjectForFirstSemGrade11AppliedSpecializedSubjects->code }}</td>
                            <td>{{ $subjectForFirstSemGrade11AppliedSpecializedSubjects->name }}</td>
                            @if ($status === 'Regular' || $status === 'Transferee')
                                <td>
                                    <input type="checkbox" name="enroll_subjects[]" {{ ($status === "Regular") ? 'checked': '' }}
                                        value="{{ $subjectForFirstSemGrade11AppliedSpecializedSubjects->id }}">
                                </td>
                            @endif
                            @if ($status === 'Iregular')
                                <td>
                                    <input type="checkbox" name="completed_subjects[]"
                                        value="{{ $subjectForFirstSemGrade11AppliedSpecializedSubjects->id }}">
                                </td>
                                <td>
                                    <input type="checkbox" name="enroll_subjects[]"
                                        value="{{ $subjectForFirstSemGrade11AppliedSpecializedSubjects->id }}">
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No Applied and Specialized Subjects Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <h4 class="text-center">Second Semester</h4>
            <table class="table" id="subjects-table">
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject</th>
                        @if ($status == 'Regular' || $status === 'Transferee')
                            <th>Enroll Subject</th>
                        @elseif ($status == 'Iregular')
                            <th>Completed Subject</th>
                            <th>Enroll Subject</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6" class="text-center">
                            <h5>Core</h5>
                        </td>
                    </tr>
                    @forelse ($subjectsForSecondSemGrade11Core as $subjectForSecondSemGrade11Core)
                        <tr>
                            <td>{{ $subjectForSecondSemGrade11Core->code }}</td>
                            <td>{{ $subjectForSecondSemGrade11Core->name }}</td>
                            @if ($status === 'Regular' || $status === 'Transferee')
                                <td>
                                    <input type="checkbox" name="enroll_subjects[]" {{ ($status === "Regular") ? 'checked': '' }}
                                        value="{{ $subjectForSecondSemGrade11Core->id }}">
                                </td>
                            @endif
                            @if ($status === 'Iregular')
                                <td>
                                    <input type="checkbox" name="completed_subjects[]"
                                        value="{{ $subjectForSecondSemGrade11Core->id }}">
                                </td>
                                <td>
                                    <input type="checkbox" name="enroll_subjects[]"
                                        value="{{ $subjectForSecondSemGrade11Core->id }}">
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No Core Subjects Found</td>
                        </tr>
                    @endforelse
                    <tr>
                        <td colspan="6" class="text-center">
                            <h5>Applied and Specialized Subjects</h5>
                        </td>
                    </tr>
                    @forelse ($subjectsForSecondSemGrade11AppliedSpecializedSubjects as $subjectForSecondSemGrade11AppliedSpecializedSubjects)
                        <tr>
                            <td>{{ $subjectForSecondSemGrade11AppliedSpecializedSubjects->code }}</td>
                            <td>{{ $subjectForSecondSemGrade11AppliedSpecializedSubjects->name }}</td>
                            @if ($status === 'Regular' || $status === 'Transferee')
                                <td>
                                    <input type="checkbox" name="enroll_subjects[]" {{ ($status === "Regular") ? 'checked': '' }}
                                        value="{{ $subjectForSecondSemGrade11AppliedSpecializedSubjects->id }}">
                                </td>
                            @endif
                            @if ($status === 'Iregular')
                                <td>
                                    <input type="checkbox"name="completed_subjects[]"
                                        value="{{ $subjectForSecondSemGrade11AppliedSpecializedSubjects->id }}">
                                </td>
                                <td>
                                    <input type="checkbox" name="enroll_subjects[]"
                                        value="{{ $subjectForSecondSemGrade11AppliedSpecializedSubjects->id }}">
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No Applied and Specialized Subjects Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex align-items-end">
                <button type="submit" wire:submit class="btn btn-primary">Enroll</button>
            </div>
        </form>
    </div>
</div>
