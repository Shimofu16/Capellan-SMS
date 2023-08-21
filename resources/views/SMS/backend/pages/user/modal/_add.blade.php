<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Add User</h5>

            </div>
            <form action="{{ route('admin.user.store') }}" method="POST">
                <div class="modal-body">
                    @csrf   
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="name" class="form-label fw-bold text-black">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="email" class="form-label fw-bold text-black">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="passwordCreate" class="form-label fw-bold text-black">Password</label>
                            <input type="password" class="form-control" id="passwordCreate" name="passwordCreate">
                            @error('password-c')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="alert alert-danger mt-2" role="alert" id="alert-password">

                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="password_confirmationCreate" class="form-label fw-bold text-black">Confirm
                                Password</label>
                            <input type="password" class="form-control" id="password_confirmationCreate"
                                name="password_confirmationCreate">
                            @error('password_confirmation-c')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="alert alert-danger mt-2" role="alert" id="alert-password_confirmationCreate">

                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="showCreate">
                                <label class="form-check-label  fw-bold text-black" for="showCreate">Show Password</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="submitCreate" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
