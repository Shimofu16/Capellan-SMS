@extends('SMS.backend.sidebar')
@section('page-title')
    Teachers
@endsection
@section('breadcrumb-title')
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
                                Teacher
                            </button>
                            @include('SMS.backend.pages.teachers.modal._add')
                        </div>

                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Contact No</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <h5 class="mb-0"> {{ $teacher->name }}</h5>
                                                <small>{{ $teacher->email }}</small>
                                            </div>
                                        </td>
                                        <td>{{ $teacher->contact }}</td>
                                        <td>{{ $teacher->age }}</td>
                                        <td>{{ $teacher->gender }}</td>
                                        <td>
                                            <div class="d-flex  justify-content-center">
                                                <button type="button" class="btn btn-sm btn-outline-primary me-1"
                                                    data-bs-toggle="modal" data-bs-target="#edit{{ $teacher->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="modal" data-bs-target="#delete{{ $teacher->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                @include('SMS.backend.pages.teachers.modal._edit')
                                                @include('SMS.backend.pages.teachers.modal._delete')
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
