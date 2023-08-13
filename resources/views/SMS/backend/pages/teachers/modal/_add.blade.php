<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Add teacher</h5>

            </div>
            <form action="{{ route('admin.teacher.store') }}" method="POST">
                @csrf   
                <div class="modal-body">
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
                        <div class="col-6">
                            <label for="gender" class="form-label fw-bold text-black">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Select gender</option>
                                <option value="Male" @if (old('gender') == 'Male') selected @endif>Male</option>
                                <option value="Female"
                                    @if (old('gender') == 'Female') selected @endif>Female
                                </option>
                            </select>
                            @error('gender')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="age" class="form-label fw-bold text-black">Age</label>
                            <input type="number" class="form-control" id="age" name="age"
                                value="{{ old('age') }}">
                            @error('age')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="contact_no" class="form-label fw-bold text-black">Contact No</label>
                            <input type="text" class="form-control" id="contact_no" name="contact"
                                value="{{ old('contact_no') }}">
                            @error('contact_no')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="email" class="form-label fw-bold text-black">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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
