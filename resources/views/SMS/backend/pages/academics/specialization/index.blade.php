@extends('SMS.backend.sidebar')

@section('page-title')
    @if ($strand_id != null)
        {{ $strand->name }}
    @else
        Specializations
    @endif
@endsection
@if ($strand_id != null)
    @section('breadcrumb-title')
        Specializations
    @endsection
    @section('breadcrumb-link')
        {{ route('admin.academic.specialization.index', ['strand_id' => $strand_id]) }}
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
                            <a href="{{ route('admin.academic.strand.index') }}" class="btn btn-primary me-1">
                                <i class="ri-arrow-go-back-line"></i>
                                Back to Strand
                            </a>
                            <button class="btn btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#add">Add
                                Specialization
                            </button>
                            @include('SMS.backend.pages.academics.specialization.modal._add')

                            <div class="dropdown">
                                <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Strands
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @foreach ($strands as $strand)
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.academic.specialization.index', $strand->id) }}">{{ $strand->slug }}</a>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>

                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table" id="specializations-table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    @if ($strand_id == null)
                                        <th scope="col">Strand</th>
                                    @endif
                                    <th scope="col">Subjects</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($specializations as $specialization)
                                    <tr>
                                        <td>{{ $specialization->name }}</td>
                                        @if ($strand_id == null)
                                            <td>{{ $specialization->strand->name }}</td>
                                        @endif
                                        <td>
                                            <a class="btn btn-outline-info btn-sm"
                                                href="{{ route('admin.academic.subject.index', ['specialization_id' => $specialization->id]) }}">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex">
                                                <button class="btn btn-outline-primary btn-sm me-1" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#edit{{ $specialization->id }}">
                                                    <i class="ri-pencil-line"></i>
                                                </button>
                                                <form
                                                    action="{{ route('admin.academic.specialization.destroy', ['id' => $specialization->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-outline-danger btn-sm"> <i
                                                            class="ri-delete-bin-2-line"></i></button>
                                                </form>

                                            </div>
                                        </td>
                                        @include('SMS.backend.pages.academics.specialization.modal._edit')

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
            $('#specializations-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
