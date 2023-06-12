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
        {{ route('admin.academic.specialization.index') }}
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
                            @if ($strand_id == null)
                                <button class="btn btn-outline-maroon me-1" data-bs-toggle="modal" data-bs-target="#add">Add
                                    Specialization
                                </button>
                                @include('SMS.backend.pages.academics.specialization.modal._add')
                            @else
                                <a href="{{ route('admin.academic.specialization.index') }}" class="btn btn-outline-maroon me-1">
                                    <i class="ri-arrow-go-back-line"></i>
                                    Back
                                </a>
                            @endif
                            {{-- generate a dropdown for strands --}}
                            <div class="dropdown">
                                <button class="btn btn-outline-maroon dropdown-toggle" type="button"
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
                                        <td class="text-center">
                                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit{{ $specialization->id }}">
                                                <i class="ri-pencil-line"></i>
                                            </button>
                                            <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete{{ $specialization->id }}">
                                                <i class="ri-delete-bin-2-line"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @include('SMS.backend.pages.academics.specialization.modal._edit')
                                    @include('SMS.backend.pages.academics.specialization.modal._delete')
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