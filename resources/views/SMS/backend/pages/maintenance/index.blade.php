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
            <div class="col-lg-6 mx-0 px-0">
                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="text-maroon">Fees
                        </h3>
                        <div class="d-flex align-items-center">
                            {{-- <button class="btn btn-outline-primary " data-bs-toggle="modal"
                                data-bs-target="#add">
                                <i class="ri-add-line"></i>
                                Add School Year
                            </button> --}}
                        </div>

                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table dataTable" id="sy-table">
                            <thead>
                                <tr>
                                    <th scope="col">Fee</th>
                                    <th scope="col">Current</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fees as $fee)
                                    <tr>
                                        <td>{{ $fee->fee }}</td>
                                        <td>
                                            @if ($fee->is_active == 1)
                                                <span class="badge bg-maroon">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit{{ $fee->id }}">
                                                <i class="ri-pencil-line"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    {{-- @include('SMS.backend.pages.maintenance.modal._edit_school_year') --}}

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
