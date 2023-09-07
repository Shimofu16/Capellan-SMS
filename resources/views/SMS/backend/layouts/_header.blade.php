<header class="header custom-header z-index-1k d-flex flex-column mb-5">

    <div class="d-flex align-items-center justify-content-between" id="header">
        <div class="d-flex align-items-center justify-content-between">
            <i class="fa-solid fa-bars-staggered toggle-sidebar-btn me-3" style="color: #ffd43b;"></i>
            <a href="#" class="logo d-flex align-items-center w-content">
                <small class="text-info w-content">Capellan Institute of Technology (San Pablo City)</small>
            </a>
        </div><!-- End Logo -->

        {{-- dropdown for schoolyears --}}
        @php
            $schoolyears = App\Models\EMS\SchoolYear::all();
            $sy_id = session()->get('sy_id');
            $schoolyear = App\Models\EMS\SchoolYear::find($sy_id);
        @endphp
        <div class="dropdown">
            <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                {{ $schoolyear->school_year }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @foreach ($schoolyears as $schoolyear)
                    <li><a class="dropdown-item"
                            href="{{ route('admin.switch.sy', $schoolyear->id) }}">{{ $schoolyear->school_year }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <nav class="header-nav">

            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/media/users/default.jpg') }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2 text-dark-50">
                            {{ Auth::user()->name }}
                        </span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>
                                {{ Auth::user()->name }}
                            </h6>

                            <span>{{ Auth::user()->role->name }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center"
                                href="{{ route('admin.profile.change-password.index') }}">
                                <i class="fa-solid fa-lock"></i>
                                <span>Change Password</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal"
                                data-bs-target="#logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>
                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->
    </div>
    <hr class="m-0">
    <div class="d-flex">
        <div class="pagetitle mb-0 px-3 py-3 d-flex align-items-center">
            <nav class="d-flex align-items-center">
                <ol class="breadcrumb mb-0">
                    @hasSection('breadcrumb-title')
                        <li class="breadcrumb-item"><a href="@yield('breadcrumb-link')">@yield('breadcrumb-title')</a></li>
                        <li class="breadcrumb-item active">@yield('page-title')</li>
                    @else
                        <li class="breadcrumb-item active">@yield('page-title')</li>
                    @endif
                </ol>
            </nav>
        </div>
    </div>

</header>
