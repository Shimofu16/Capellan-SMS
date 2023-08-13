<div class="card-body">
    <div class="row align-items-end">
        {{-- generate a livewire select for grade levels --}}
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

        <form
            action="{{ route('admin.student.store', ['student_id' => $student->id, 'grade_level_id' => $student->enrollment->gradelevel_id, 'status' => $status]) }}"
            method="POST">
            @csrf
            <h4 class="text-center">{{ $semester }}</h4>
            <table class="table " id="subjects-table">
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
                    @forelse ($coreSubjects as $coreSubject)
                        <tr>
                            <td>{{ $coreSubject->code }}</td>
                            <td>{{ $coreSubject->name }}</td>
                            @if ($status === 'Regular' || $status === 'Transferee')
                                <td>
                                    <input type="checkbox" name="enroll_subjects[]"
                                        {{ $status === 'Regular' ? 'checked' : '' }}
                                        value="{{ $coreSubject->id }}">
                                </td>
                            @endif
                            @if ($status === 'Iregular')
                                <td>
                                    <input type="checkbox" name="completed_subjects[]"
                                        wire:model="completed.{{ $coreSubject->id }}"
                                        {{ isset($enroll[$coreSubject->id]) && $enroll[$coreSubject->id] == $coreSubject->id ? 'disabled' : '' }}
                                        value="{{ $coreSubject->id }}">
                                </td>
                                <td>
                                    <input type="checkbox" name="enroll_subjects[]"
                                        wire:model="enroll.{{ $coreSubject->id }}"
                                        {{ isset($completed[$coreSubject->id]) && $completed[$coreSubject->id] == $coreSubject->id ? 'disabled' : '' }}
                                        value="{{ $coreSubject->id }}">
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
                    @forelse ($appliedSpecializedSubjects as $appliedSpecializedSubject)
                        <tr>
                            <td>{{ $appliedSpecializedSubject->code }}</td>
                            <td>{{ $appliedSpecializedSubject->name }}</td>
                            @if ($status === 'Regular' || $status === 'Transferee')
                                <td>
                                    <input type="checkbox" name="enroll_subjects[]"
                                        {{ $status === 'Regular' ? 'checked' : '' }}
                                        value="{{ $appliedSpecializedSubject->id }}">
                                </td>
                            @endif
                            @if ($status === 'Iregular')
                                <td>
                                    <input type="checkbox" name="completed_subjects[]"
                                        wire:model="completed.{{ $appliedSpecializedSubject->id }}"
                                        {{ isset($enroll[$appliedSpecializedSubject->id]) && $enroll[$appliedSpecializedSubject->id] == $appliedSpecializedSubject->id ? 'disabled' : '' }}
                                        value="{{ $appliedSpecializedSubject->id }}">
                                </td>
                                <td>
                                    <input type="checkbox" name="enroll_subjects[]"
                                        wire:model="enroll.{{ $appliedSpecializedSubject->id }}"
                                        {{ isset($completed[$appliedSpecializedSubject->id]) && $completed[$appliedSpecializedSubject->id] == $appliedSpecializedSubject->id ? 'disabled' : '' }}
                                        value="{{ $appliedSpecializedSubject->id }}">
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
            <div class="d-flex align-items-end justify-content-end">
                <button type="submit" wire:submit class="btn btn-primary" wire:loading.attr='disabled'>Enroll</button>
            </div>
        </form>
    </div>
</div>
