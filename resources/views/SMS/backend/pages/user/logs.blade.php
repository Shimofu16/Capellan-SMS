@extends('AMS.backend.admin-layouts.sidebar')

@section('page-title')
    {{ $pageTitle }}
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
                            <a href="{{ route('admin.user.index') }}" class="btn btn-outline-primary ">
                                <i class="ri-arrow-go-back-line"></i>
                                <span>Back</span>
                            </a>
                        </div>

                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table dataTable" id="users-table">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time In</th>
                                    <th scope="col">Time Out</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->logs as $log)
                                    <tr>
                                        <td>{{ date('M d, Y', strtotime($log->created_at)) }}</td>
                                        <td>{{ date('h:i A', strtotime($log->time_in)) }} </td>
                                        <td>
                                            @if ($log->time_out != null)
                                                {{ date('h:i A', strtotime($log->time_out)) }}
                                            @else
                                                <span class="badge bg-danger">Not Logged Out</span>
                                            @endif
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

