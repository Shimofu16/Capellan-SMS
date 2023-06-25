@extends('SMS.backend.sidebar')
@section('page-title')
    Students
@endsection
@section('breadcrumb-title')
    @if ($gradeLevel)
        {{ $gradeLevel->name }}
    @endif
@endsection
@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="text-maroon">@yield('page-title')
                        </h3>
                        <div class="d-flex align-items-center">

                            {{-- generate a dropdown for strands --}}
                            <div class="dropdown me-1">
                                <button class="btn btn-outline-maroon dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Grade Levels
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @foreach ($gradeLevels as $level)
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.student.index', ['grade_level_id' => $level->id]) }}">{{ $level->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                            <div class="dropdown">
                                <button class="btn btn-outline-maroon dropdown-toggle" type="button" id="dropdownMenuButton2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Strands
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                    @forelse ($strands as $str)
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.student.index', ['strand_id' => $str->id]) }}">{{ $str->name }}</a>
                                        </li>
                                        @empty
                                        <li><a class="dropdown-item" href="#">No Strands</a></li>
                                    @endforelse
                                </ul>

                            </div>
                        </div>

                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table" id="subjects-table">
                            <thead>
                                <tr>
                                    <th scope="col">Student LRN/Number</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Sex</th>
                                    <th scope="col">Birth date</th>
                                    <th scope="col">Address</th>
                                    @if ($grade_level_id == null)
                                        <th scope="col">Grade Level</th>
                                    @endif
                                    @if ($strand_id == null)
                                        <th scope="col">Strand/Specialization</th>
                                    @endif

                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

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
            $('#subjects-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
