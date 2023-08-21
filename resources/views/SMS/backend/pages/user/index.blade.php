@extends('SMS.backend.sidebar')

@section('page-title')
    Users
@endsection

@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="text-dark fw-bold">@yield('page-title')
                        </h3>
                        <div class="d-flex align-items-center">
                            <button class="btn btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#add">Add
                                Account</button>
                                @include('SMS.backend.pages.user.modal._add')
                        </div>

                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table dataTable" id="users-table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Logs</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span>{{ $user->name }}</span>
                                                <small>{{ $user->email }}</small>
                                            </div>
                                        </td>

                                        <td>
                                            {{ Str::ucfirst($user->role->name) }}
                                        </td>

                                        <td>
                                            @if ($user->status == 'online')
                                                <span class="badge bg-success">{{ $user->status }}</span>
                                            @endif
                                            @if ($user->status == 'offline')
                                                <span class="badge bg-danger">{{ $user->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-link text-info" type="button" data-bs-toggle="modal"
                                                data-bs-target="#logs{{ $user->id }}" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="View logs.">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                            @include('SMS.backend.pages.user.modal._logs')
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">

                                                <button class="btn btn-link text-primary" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#edit{{ $user->id }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Change password">
                                                    <i class="ri-pencil-line text-primary" aria-hidden="true"></i>
                                                </button>
                                                <button class="btn btn-link text-danger" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#delete{{ $user->id }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Logout User"
                                                    {{ $user->status == 'offline' ? 'disabled' : '' }}>
                                                    <i class="ri-shut-down-line text-danger" aria-hidden="true"></i>
                                                </button>
                                                @include('SMS.backend.pages.user.modal._edit')
                                                @include('SMS.backend.pages.user.modal._delete')
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('scripts')
    {{-- generate a jquery code for showing and hiding password --}}
    <script>
        $(document).ready(function() {
            $('#alert-passwordUpdate').hide();
            $('#alert-password_confirmationUpdate').hide();
            $('#showUpdate').click(function() {
                if ($(this).is(':checked')) {
                    $('#passwordUpdate').attr('type', 'text');
                    $('#password_confirmationUpdate').attr('type', 'text');
                    console.log('checked')
                } else {
                    $('#passwordUpdate').attr('type', 'password');
                    $('#password_confirmationUpdate').attr('type', 'password');
                    console.log('uncheked')
                }
            });
            /* check also if the password is 8 characters */
            $('#passwordUpdate').keyup(function() {
                if ($('#passwordUpdate').val()
                    .length >= 8) {
                    $('#passwordUpdate').css('border', '1px solid green');
                    $('#alert-passwordUpdate').hide();
                    $('#submitUpdate').prop('disabled', false);
                } else {
                    $('#passwordUpdate').css('border', '1px solid red');
                    $('#alert-passwordUpdate').show();
                    $('#alert-passwordUpdate').text('Password must be 8 characters');
                    $('#submitUpdate').prop('disabled', true);
                }
            });
            /* check if the password and confirm password are the same */
            $('#password_confirmationUpdate').keyup(function() {
                if ($('#passwordUpdate').val() == $('#password_confirmationUpdate').val()) {
                    $('#password_confirmationUpdate').css('border', '1px solid green');
                    $('#alert-password_confirmationUpdate').hide();
                    if ($('#passwordUpdate').val()
                        .length >= 8) {
                        $('#submitUpdate').prop('disabled', false);
                    }
                } else {
                    $('#password_confirmationUpdate').css('border', '1px solid red');
                    $('#alert-password_confirmationUpdate').show();
                    $('#alert-password_confirmationUpdate').text(
                        'Password and Confirm Password must be the same');
                    $('#submitUpdate').prop('disabled', true);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#alert-passwordCreate').hide();
            $('#alert-password_confirmationCreate').hide();
            $('#showCreate').click(function() {
                if ($(this).is(':checked')) {
                    $('#passwordCreate').attr('type', 'text');
                    $('#password_confirmationCreate').attr('type', 'text');
                    console.log('checked')
                } else {
                    $('#passwordCreate').attr('type', 'password');
                    $('#password_confirmationCreate').attr('type', 'password');
                    console.log('uncheked')
                }
            });
            /* check also if the password is 8 characters */
            $('#passwordCreate').keyup(function() {
                if ($('#passwordCreate').val()
                    .length >= 8) {
                    $('#passwordCreate').css('border', '1px solid green');
                    $('#alert-passwordCreate').hide();
                    $('#submitCreate').prop('disabled', false);
                } else {
                    $('#passwordCreate').css('border', '1px solid red');
                    $('#alert-passwordCreate').show();
                    $('#alert-passwordCreate').text('Password must be 8 characters');
                    $('#submitCreate').prop('disabled', true);
                }
            });
            /* check if the password and confirm password are the same */
            $('#password_confirmationCreate').keyup(function() {
                if ($('#passwordCreate').val() == $('#password_confirmationCreate').val()) {
                    $('#password_confirmationCreate').css('border', '1px solid green');
                    $('#alert-password_confirmationCreate').hide();
                    if ($('#passwordCreate').val()
                        .length >= 8) {
                        $('#submitCreate').prop('disabled', false);
                    }
                } else {
                    $('#password_confirmationCreate').css('border', '1px solid red');
                    $('#alert-password_confirmationCreate').show();
                    $('#alert-password_confirmationCreate').text(
                        'Password and Confirm Password must be the same');
                    $('#submitCreate').prop('disabled', true);
                }
            });
        });
    </script>
@endsection
