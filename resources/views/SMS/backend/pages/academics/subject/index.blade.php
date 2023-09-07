@extends('SMS.backend.sidebar')

@section('page-title')
    @if ($specialization_id != null)
        {{ $specialization->specialization }}
    @else
        Subjects
    @endif
@endsection
@if ($specialization_id != null)
    @section('breadcrumb-title')
        Subjects
    @endsection
    @section('breadcrumb-link')
        {{ route('admin.academic.subject.index', ['gradeLevelId' => $gradeLevelId, 'specialization_id' => $specialization->id]) }}
    @endsection

@endif
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
                                Subject
                            </button>
                            @include('SMS.backend.pages.academics.subject.modal._add')

                            {{-- generate a dropdown for strands --}}
                            <div class="dropdown">
                                <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Specializations
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @foreach ($specializations as $specialization)
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.academic.subject.index',['gradeLevelId' => $gradeLevelId, 'specialization_id' => $specialization->id] ) }}">{{ $specialization->specialization }}</a>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>

                    </div>
                    <div class="card-body">

                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#first-sem">First
                                    Semester</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#second-sem">Second
                                    Semester</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active first-sem p-3" id="first-sem">
                                <table class="table dataTable" id="subjects-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Code</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Units</th>
                                            @if ($specialization_id == null)
                                                <th scope="col">Specialization</th>
                                            @endif
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($firstSemSubjects as $firstSemSubject)
                                            <tr>
                                                <td>{{ $firstSemSubject->code }}</td>
                                                <td>{{ $firstSemSubject->name }}</td>
                                                <td>{{ $firstSemSubject->unit }}</td>
                                                @if ($specialization_id == null)
                                                    <td>{{ $firstSemSubject->specialization->specialization }}</td>
                                                @endif
                                                <td class="text-center">
                                                    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#edit{{ $firstSemSubject->id }}">
                                                        <i class="ri-pencil-line"></i>
                                                    </button>
                                                    <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#delete{{ $firstSemSubject->id }}">
                                                        <i class="ri-delete-bin-2-line"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @include('SMS.backend.pages.academics.subject.modal._first_sem_edit')
                                            @include('SMS.backend.pages.academics.subject.modal._first_sem_delete')
                                        @endforeach
                                    </tbody>

                                </table>

                            </div>

                            <div class="tab-pane fade second-sem pt-3" id="second-sem">

                                <table class="table dataTable" id="subjects-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Code</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Units</th>
                                            @if ($specialization_id == null)
                                                <th scope="col">Specialization</th>
                                            @endif
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($secondSemSubjects as $secondSemSubject)
                                            <tr>
                                                <td>{{ $secondSemSubject->code }}</td>
                                                <td>{{ $secondSemSubject->name }}</td>
                                                <td>{{ $secondSemSubject->unit }}</td>
                                                @if ($specialization_id == null)
                                                    <td>{{ $secondSemSubject->specialization->specialization }}</td>
                                                @endif
                                                <td class="text-center">
                                                    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#edit{{ $secondSemSubject->id }}">
                                                        <i class="ri-pencil-line"></i>
                                                    </button>
                                                    <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#delete{{ $secondSemSubject->id }}">
                                                        <i class="ri-delete-bin-2-line"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @include('SMS.backend.pages.academics.subject.modal._second_sem_edit')
                                            @include('SMS.backend.pages.academics.subject.modal._second_sem_delete')
                                        @endforeach
                                    </tbody>

                                </table>

                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
