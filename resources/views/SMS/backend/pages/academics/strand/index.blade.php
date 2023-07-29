@extends('SMS.backend.sidebar')

@section('page-title')
    Strands
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
                                Strand
                            </button>
                            @include('SMS.backend.pages.academics.strand.modal._add')
                        </div>

                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table" id="strands-table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col" >Specialization</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($strands as $strand)
                                    <tr>
                                        <td>{{ $strand->name }}</td>
                                        <td>{{ $strand->slug }}</td>
                                        <td>
                                            <a class="btn btn-outline-info btn-sm" href="{{ route('admin.academic.specialization.index', ['strand_id' =>$strand->id]) }}">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit{{ $strand->id }}">
                                                <i class="ri-pencil-line"></i>
                                            </button>
                                            <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete{{ $strand->id }}">
                                                <i class="ri-delete-bin-2-line"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @include('SMS.backend.pages.academics.strand.modal._edit')
                                    @include('SMS.backend.pages.academics.strand.modal._delete')
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
            $('#strands-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
