@extends('SMS.backend.sidebar')
@section('page-title')
    {{ $student->getFullName() }}
@endsection
@section('breadcrumb-title')
    Student Subject Enrollment
@endsection
@section('styles')
    <style>
        tr.bg-orange th {
            background-color: #f8cbad;
        }

        table.table-bordered {
            border-collapse: collapse;
            border: 1px solid black;
            /* Adjust border width as needed */
        }

        table.table-bordered th,
        table.table-bordered td {
            border: 1px solid black;
            /* Adjust border width as needed */
            padding: 8px;
            /* Add padding to cells for better spacing */
        }
    </style>
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
                            <a href="{{ route('admin.student.edit', ['id' => $student->id]) }}"
                                class="btn btn-outline-primary me-1"><i class="fa-solid fa-chevron-left"></i> Back</a>
                            <button class="btn btn-primary" onclick="generatePDF()"><i
                                    class="fa-solid fa-file-arrow-down"></i> Download</button>
                        </div>

                    </div>
                    <div class="card-body">
                        <div id="wrapper" class="border p-3">
                            <div class="row flex-column text-center">
                                <div class="d-flex justify-content-center  align-items-center ">
                                    <div class="mb-auto mt-3">
                                        <img src="{{ asset('assets/media/logos/capellan_logo.png') }}" alt="logo"
                                            class="img-fluid" style="width: 100px; height: 100px;">
                                    </div>
                                    <div class="ms-1 me-5 mt-5">
                                        <h4 class="fw-bold">CAPELLAN INSTITUTE OF TECHNOLOGY</h4>
                                        <h6 class="mb-4 text-center">San Pablo City Branch</h6>
                                        <h4 class="fw-bold mb-3">{{ $specialization->strand->strand }}</h4>
                                        <h4 class="fw-bold">{{ $specialization->specialization }}</h4>
                                        <h6 class="mb-4">Grade {{ $gradeLevel->grade_level }} - {{ $semester }}</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Table with stripped rows -->
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr class="bg-orange">
                                        <th scope="col" class="text-center">Core Subjects</th>
                                        <th scope="col" class="text-center">Grade</th>
                                        <th scope="col" class="text-center">To be Taken</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coreSubjects as $coreSubject)
                                        <tr>
                                            <td>
                                                {{ $coreSubject->code }} -
                                                {{ $coreSubject->name }}
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    <tr class="bg-orange">
                                        <th scope="col" class="text-center">APPLIED & SPECIALIZATION</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    @foreach ($appliedSubjects as $appliedSubject)
                                        <tr>
                                            <td>
                                                {{ $appliedSubject->code }} -
                                                {{ $appliedSubject->name }}
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <!-- End Table with stripped rows -->
                            <div class="d-flex justify-content-between mt-5 pt-5">
                                <div>
                                    <h5 class="pt-3 text-center" style="border-top: 2px #000 solid ">Signature over printed
                                        name (Registrar)</h5>
                                </div>
                                <div>
                                    <h5 class="pt-3 text-center" style="border-top: 2px #000 solid ">Signature over printed
                                        name (Student)</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer border-0">

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"
        integrity="sha512-YcsIPGdhPK4P/uRW6/sruonlYj+Q7UHWeKfTAkBW+g83NKM+jMJFJ4iAPfSnVp7BKD4dKMHmVSvICUbE/V1sSw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        function generatePDF() {
            var element = document.getElementById('wrapper');
            var opt = {
                margin: 0,
                filename: '{{ $student->getFullName() }}.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'a4',
                    orientation: 'portrait'
                }
            };
            html2pdf().set(opt).from(element).save();
        };
    </script>
@endsection
