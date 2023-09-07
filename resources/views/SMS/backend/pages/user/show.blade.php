@extends('SMS.backend.sidebar')

@section('page-title')
    {{ $user->name }}'s Logs
@endsection

@section('breadcrumb-title')
    Users
@endsection
@section('breadcrumb-link')
    {{ route('admin.user.index') }}
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
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#login-hostory">Login
                                    History</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#activity-history">{{ $user->name }} Activity</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active login-hostory p-3" id="login-hostory">
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
                                                <td>{{ date('F d, Y', strtotime($log->created_at)) }}</td>
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

                            </div>

                            <div class="tab-pane fade activity-history pt-3" id="activity-history">

                                <table class="table dataTable" id="users-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Activity Type</th>
                                            <th scope="col">Activity Description</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->activities as $activity)
                                            <tr>
                                                <td>{{ $activity->type }} </td>
                                                <td>{{ $activity->description }} </td>
                                                <td>{{ date('F d, Y - h:i:s A', strtotime($activity->created_at)) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>

                            </div>


                        </div>
                        <!-- End Bordered Tabs -->

                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection

