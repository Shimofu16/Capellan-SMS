@extends('SMS.backend.sidebar')
@section('page-title')
    {{ $student->getFullName() }} 
@endsection

@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="text-dark fw-bold">@yield('page-title') - {{ $student->specialization->name }}
                        </h3>
                        <div class="d-flex align-items-center">
                           {{-- backbutton --}}
                           <a href="{{ route('admin.student.index') }}"
                                    class="btn btn-outline-primary me-1">
                                    <i class="ri-arrow-go-back-line"></i>
                                    Back
                                </a>
                        </div>

                    </div>
                   @livewire('enroll-student-subject', ['student' => $student,'gradeLevels' => $gradeLevels])
                </div>

            </div>
        </div>
    </section>
@endsection

