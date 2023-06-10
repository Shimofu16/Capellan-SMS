<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin @hasSection('page-title')
            - @yield('page-title')
        @else
        @endif
    </title>

    <!-- Icon -->
    <link rel="icon" href="{{ asset('assets/media/logos/capellan_logo.png') }}" type="image/x-icon">


    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    {{-- Packages --}}
    <link href="{{ asset('assets/packages/bootstrap-5.3.0-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/packages/DataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/packages/fontawesome-free-6.4.0-web/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/packages/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/packages/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/packages/remixicon/remixicon.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/customs/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/customs/css/custom.css') }}" rel="stylesheet">
    {{-- page css --}}
    @yield('styles')

</head>

<body>

    <!-- ======= Header ======= -->
    @include('SMS.backend.layouts.logout-modal')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @yield('sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">
        <!-- End Page Title -->
        
        @include('SMS.backend.layouts._header')
        
        <section class="section">
            @yield('contents')
        </section>

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('SMS.backend.layouts._footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/packages/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/packages/bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/packages/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/packages/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/packages/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/packages/jQuery-3.6.0/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/packages/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/packages/tinymce/tinymce.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/customs/js/main.js') }}"></script>

    {{-- sweetalert --}}
    @include('sweetalert::alert')
    @yield('scripts')
</body>

</html>
