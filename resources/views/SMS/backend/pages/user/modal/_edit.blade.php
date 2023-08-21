<div class="modal fade" id="edit{{ $user->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Change Password</h5>

            </div>
            <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="passwordUpdate" class="form-label fw-bold text-black">Password</label>
                            <input type="password" class="form-control" id="passwordUpdate" name="passwordUpdate">
                            @error('passwordUpdate')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="alert alert-danger mt-2" role="alert" id="alert-password">

                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="password_confirmationUpdate" class="form-label fw-bold text-black">Confirm
                                Password</label>
                            <input type="password" class="form-control" id="password_confirmationUpdate"
                                name="password_confirmationUpdate">
                            @error('password_confirmationUpdate')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="alert alert-danger mt-2" role="alert" id="alert-password_confirmationUpdate">

                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="showUpdate">
                                <label class="form-check-label fw-bold text-black" for="showUpdate">Show
                                    Password</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="submitUpdate" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
