@extends('SMS.backend.sidebar')
@section('page-title')
    Students
@endsection
@section('breadcrumb-title')
    @if ($gradeLevel)
        {{ $gradeLevel->grade_level }}
    @endif
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

                            @include('SMS.backend.pages.students.modal._add')
                            <div class="dropdown me-1">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Grade Levels
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @foreach ($gradeLevels as $level)
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.student.index', ['type' => 'Specialization', 'id' => $level->id]) }}">{{ $level->grade_level }}</a>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Specialization
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                    @forelse ($specializations as $specialization)
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.student.index', ['type' => 'Specialization', 'id' => $specialization->id]) }}">{{ $specialization->specialization }}</a>
                                        </li>
                                    @empty
                                        <li><a class="dropdown-item" href="#">No Specializations</a></li>
                                    @endforelse
                                </ul>

                            </div>
                        </div>

                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table" id="students-table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Sex</th>
                                    <th scope="col">Birth date</th>
                                    <th scope="col">Address</th>

                                    @if ($type != 'Grade Level')
                                        <th scope="col">Grade Level</th>
                                    @endif
                                    @if ($type != 'Specialization')
                                        <th scope="col">Specialization</th>
                                    @endif

                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span> {{ $student->getFullName() }}</span>
                                                <small>{{ $student->lrn }}</small>
                                            </div>
                                        </td>
                                        <td>{{ $student->age }}</td>
                                        <td>{{ $student->sex }}</td>
                                        <td>{{ date('F d, Y', strtotime($student->b_date)) }}</td>
                                        <td>{{ $student->address }}</td>
                                        @if ($type != 'Grade Level')
                                        <td>{{ $student->enrollment->gradeLevel->grade_level }}</td>
                                    @endif
                                    @if ($type != 'Specialization')
                                        <td>{{ $student->enrollment->specialization->specialization }}</td>
                                    @endif
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('admin.student.edit', ['id' => $student->id]) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
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
    <script>
        $(document).ready(function() {
            $('#students-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
