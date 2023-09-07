@extends('SMS.backend.sidebar')
@section('page-title')
    Dashboard
@endsection
@section('contents')
    <section class="section">
        <div class="row">

            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Students {{-- <span>| Today</span> --}}</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <h4><i class="ri-team-line"></i></h4>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $studentsCount }}</h6>
                                {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span> --}}

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Teachers {{-- <span>| Today</span> --}}</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <h4>
                                    <i class="fa-solid  fa-chalkboard-user"></i>
                                </h4>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $teachersCount }}</h6>
                                {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span> --}}

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Revenue Card -->

        </div>
        <div class="row">



            <div class="col-md-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Enrolled Students</h5>

                        <div class="d-flex align-items-center justify-content-center">
                            <!-- Pie Chart -->
                            @if (count($getTotalPerSpecialization) == 0)
                                <div class="alert alert-danger text-center">
                                    <strong>No data found!</strong>
                                </div>
                            @else
                                <canvas id="specialization" class="h-60 w-60">
                                </canvas>
                            @endif

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        const colors = ['#1f77b4', '#ff7f0e', '#2ca02c', '#d62728', '#9467bd', '#8c564b', '#e377c2', '#7f7f7f', '#bcbd22',
            '#17becf', '#1b9e77', '#d95f02', '#7570b3', '#e7298a'
        ];

        function generateCharts(selector, label, data) {
            const dataLength = data.length;
            const backgroundColors = colors.slice(0, dataLength);
            new Chart(document.querySelector(selector), {
                type: 'pie',
                data: {
                    labels: data.map(d => d.specialization),
                    datasets: [{
                        label: label,
                        data: data.map(d => d.students_count),
                        backgroundColor: backgroundColors,
                        hoverOffset: 4
                    }]
                }
            });
        }

        document.addEventListener("DOMContentLoaded", () => {
            generateCharts('#specialization', 'Enrolled Students', {!! $getTotalPerSpecialization !!});
        });
    </script>
@endsection
