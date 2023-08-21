@extends('SMS.backend.sidebar')

@section('page-title')
    CLass Programs
@endsection

@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="text-dark fw-bold">@yield('page-title')
                        </h3>
                        <div>
                            <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#add">
                                Add Class Program
                            </button>
                            @include('SMS.backend.pages.schedule.modal._add')
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $schedule->name }}</td>

                                        <td>
                                            <button class="btn btn-outline-info btn-sm" type="button"
                                                data-bs-toggle="modal" data-bs-target="#view{{ $schedule->id }}">
                                                <i class="ri-eye-line"></i>
                                            </button>
                                            @include('SMS.backend.pages.schedule.modal._view')
                                        </td>
                                        <td class="">
                                            <div class="d-flex justify-content-center">
                                                <button  type="button" class="btn btn-outline-primary btn-sm me-1"
                                                    data-bs-toggle="modal" data-bs-target="#edit{{ $schedule->id }}">
                                                    <i class="ri-pencil-line"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger btn-sm"
                                                    data-bs-toggle="modal" data-bs-target="#delete{{ $schedule->id }}">
                                                    <i class="ri-delete-bin-2-line"></i>
                                                </button>
                                            </div>
                                            @include('SMS.backend.pages.schedule.modal._edit')
                                            @include('SMS.backend.pages.schedule.modal._delete')
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
