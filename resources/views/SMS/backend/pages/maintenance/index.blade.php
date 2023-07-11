@extends('SMS.backend.sidebar')

@section('page-title')
    System Maintenance
@endsection

@section('contents')
    <section class="section">
        <div class="row  d-flex align-items-center p-3 mb-3 rounded text-maroon shadow-sm" style="background-color: #FFFFFF;">
            <h3 class="text-maroon mb-0">
                @yield('page-title')
            </h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="text-maroon">School Year
                        </h3>
                        <div class="d-flex align-items-center">


                        </div>

                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table" id="sy-table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Current Semester</th>
                                    <th scope="col">Start and End Dates</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($school_years as $sy)
                                    <tr>
                                        <td>{{ $sy->name }}</td>
                                        <td>{{ $sy->semester->name }}</td>
                                        <td>{{ date('F d, Y', strtotime($sy->start_date))   }} - {{date('F d, Y', strtotime($sy->end_date))}}</td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit{{ $sy->id }}">
                                                <i class="ri-pencil-line"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @include('SMS.backend.pages.maintenance.modal._edit_school_year')

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
            $('#sy-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
