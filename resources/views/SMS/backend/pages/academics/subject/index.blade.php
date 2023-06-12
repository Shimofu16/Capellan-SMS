@extends('SMS.backend.sidebar')

@section('page-title')
    @if ($specialization_id != null)
        {{ $specialization->name }}
    @else
        Subjects
    @endif
@endsection
@if ($specialization_id != null)
    @section('breadcrumb-title')
        Subjects
    @endsection
    @section('breadcrumb-link')
        {{ route('admin.academic.subject.index') }}
    @endsection

@endif
@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="text-maroon">@yield('page-title')
                        </h3>
                        <div class="d-flex align-items-center">
                            @if ($specialization_id == null)
                                <button class="btn btn-outline-maroon me-1" data-bs-toggle="modal" data-bs-target="#add">Add
                                    Subject
                                </button>
                                @include('SMS.backend.pages.academics.subject.modal._add')
                            @else
                                <a href="{{ route('admin.academic.subject.index') }}" class="btn btn-outline-maroon me-1">
                                    <i class="ri-arrow-go-back-line"></i>
                                    Back
                                </a>
                            @endif
                            {{-- generate a dropdown for strands --}}
                            <div class="dropdown">
                                <button class="btn btn-outline-maroon dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Specializations
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @foreach ($specializations as $specialization)
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.academic.subject.index', $specialization->id) }}">{{ $specialization->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>

                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table" id="subjects-table">
                            <thead>
                                <tr>
                                    <th scope="col">Code</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Units</th>
                                    <th scope="col">Prerequisite</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Semester</th>
                                    @if ($specialization_id == null)
                                        <th scope="col">Specialization</th>
                                    @endif
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $subject)
                                    <tr>
                                        <td>{{ $subject->code }}</td>
                                        <td>{{ $subject->name }}</td>
                                        <td>{{ $subject->unit }}</td>
                                        <td>{{ $subject->prerequisite }}</td>
                                        <td>{{ $subject->type }}</td>
                                        <td>{{ $subject->semester->name }}</td>
                                        @if ($specialization_id == null)
                                            <td>{{ $subject->specialization->name }}</td>
                                        @endif
                                        <td class="text-center">
                                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit{{ $subject->id }}">
                                                <i class="ri-pencil-line"></i>
                                            </button>
                                            <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete{{ $subject->id }}">
                                                <i class="ri-delete-bin-2-line"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @include('SMS.backend.pages.academics.subject.modal._edit')
                                    @include('SMS.backend.pages.academics.subject.modal._delete')
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
            $('#subjects-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection