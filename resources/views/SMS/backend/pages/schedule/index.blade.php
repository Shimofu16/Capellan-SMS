@extends('SMS.backend.sidebar')

@section('page-title')
    Class Schedules
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
                                Add Class Schedule
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
                                    <th scope="col">Subject</th>
                                    <th scope="col">Teacher</th>
                                    <th scope="col">Specialization</th>
                                    <th scope="col">Schedule</th>
                                    <th scope="col">Semester</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $schedule->subject->name }}</td>
                                        <td>{{ $schedule->teacher->name }}</td>
                                        <td>{{ $schedule->subject->specialization->specialization }}</td>
                                        <td>
                                            <span>{{ $schedule->days }}</span><br>
                                            <span>At {{ date('h:i A', strtotime($schedule->start_time)) }} -
                                                {{ date('h:i A', strtotime($schedule->end_time)) }}</span>
                                        </td>
                                        <td>{{ $schedule->subject->semester->sem }}</td>

                                        <td>
                                            <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $schedule->id }}">
                                            <i class="ri-delete-bin-2-line"></i>
                                        </button>
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
