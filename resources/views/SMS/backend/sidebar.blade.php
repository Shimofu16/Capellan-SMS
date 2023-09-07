@extends('SMS.backend.layouts.master')

@section('sidebar')
    <aside id="sidebar" class="sidebar top-0 z-index-1k">

        <ul class="sidebar-nav" id="sidebar-nav">


            <li class="nav-item mt-3 mb-5 d-flex justify-content-center align-items-center">
                <a class="" href="{{ route('admin.dashboard.index') }}">
                    <img alt="{{ config('app.name') }}" src="{{ asset('assets/media/logos/capellan-name-logo.png') }}"
                        width="180px" />
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.dashboard.index') ? 'active' : '' }}"
                    href="{{ route('admin.dashboard.index') }}">
                    <i class="fa-solid icon-yellow fa-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed {{ Route::is('admin.subject.*') ? 'active' : '' }}" data-bs-target="#academics"
                    data-bs-toggle="collapse" href="#">
                    <i class="fa-solid icon-yellow fa-book-open"></i>
                    <span>Subjects</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="academics" class="nav-content collapse p-2" data-bs-parent="#sidebar-nav">
                    <li class="{{ Route::is('admin.academic.subject.index') ? 'collapse-active' : '' }}">
                        <a href="{{ route('admin.academic.subject.index', ['gradeLevelId' => 1]) }}">
                            <i class="fa-solid fa-minus"></i>
                            <span>Grade 11</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('admin.academic.subject.index') ? 'collapse-active' : '' }}">
                        <a href="{{ route('admin.academic.subject.index', ['gradeLevelId' => 2]) }}">
                            <i class="fa-solid fa-minus"></i>
                            <span>Grade 12</span>
                        </a>
                    </li>
                </ul>

            </li>
            <!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.student.index') ? 'active' : '' }}"
                    href="{{ route('admin.student.index') }}">
                    <i class="fa-solid icon-yellow fa-graduation-cap"></i>
                    <span>Students</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.schedule.index') ? 'active' : '' }}"
                    href="{{ route('admin.schedule.index') }}">
                    <i class="fa-regular icon-yellow fa-calendar-days"></i>
                    <span>Schedules</span>
                </a>
            </li>

            <!-- End Charts Nav -->
            @if (Auth::user()->isRole('admin'))
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.teacher.index') ? 'active' : '' }}"
                        href="{{ route('admin.teacher.index') }}">
                        <i class="fa-solid icon-yellow fa-chalkboard-user"></i>
                        <span>Teachers</span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.maintenance.index') ? 'active' : '' }}"
                        href="{{ route('admin.maintenance.index') }}">
                        <i class="fa-solid icon-yellow fa-gears"></i>
                        <span>Maintenance</span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.user.index') ? 'active' : '' }}"
                        href="{{ route('admin.user.index') }}">
                        <i class="fa-solid icon-yellow fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
            @endif
            <!-- End Icons Nav -->


    </aside>
@endsection
