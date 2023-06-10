<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <meta charset="utf-8" />

    {{-- Title Section --}}
    <title>{{ config('app.name') }} | Login</title>

    {{-- Meta Data --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    {{-- ICON --}}
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/capellan_logo.png') }}" />

    {{-- bootstrap --}}
    <link href="{{ asset('assets/packages/bootstrap-5.3.0-dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    {{-- custom styles --}}
    <link href="{{ asset('assets/customs/css/pages/login.css') }}" rel="stylesheet" type="text/css" />


</head>
<!--end::Head-->

<!--begin::Body-->

<body>

    <!--begin::Main-->
    <section class="section overflow-hidden">
        <!--begin::Login-->
        <div class="row crow-gap-0 bg-white" id="kt_login">
            <!--begin::Aside-->
            <div class="col-lg-3 col-md-4">
                <!--begin: Aside Container-->
                <div class="vh-100 d-flex flex-row-fluid flex-column justify-content-between border border-secondary">
                    <!--begin::Aside body-->
                    <div class="d-flex flex-column-fluid flex-column flex-center p-4 mt-5">
                        <a href="#" class="mb-15 text-center">
                            <img src="{{ asset('assets/media/logos/capellan_logo.png') }}" class="logo" alt="" />
                        </a>

                        <!--begin::Signin-->
                        <div class="login-form login-signin">
                            <div class="text-center mb-10 mb-lg-20">
                                <h2 class="font-weight-bold">Sign In</h2>
                                <p class="text-muted font-weight-bold">Enter your username and password</p>
                            </div>

                            <form method="POST" action="{{ route('auth.store') }}" class="form">
                                @csrf
                            <!--begin::Form-->
                                <div class="form-group py-3 m-0">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text"
                                        placeholder="email" name="email" value="{{ old('email') }}" autocomplete="off" />
                                        {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> --}}

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group py-3 border-top m-0">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="Password"
                                        placeholder="Password" name="password" id = "password"/>
                                </div>


                                <div
                                    class="form-group d-flex flex-wrap justify-content-between align-items-center ">
                                    <button class="btn btn-primary font-weight-bold mx-auto w-100" type="submit">Sign In</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>

                    </div>
                    <!--end::Aside body-->

                    <!--begin: Aside footer for desktop-->
                    <div class="d-flex flex-column-auto justify-content-between mt-15">
                        <div class="text-dark-50 font-weight-bold my-2 text-center mx-auto">
                            &copy; 2022 CIT San Pablo
                        </div>
                        {{-- <div class="d-flex order-1 order-sm-2 my-2">
                            <a href="#" class="text-muted text-hover-primary">Privacy</a>
                            <a href="#" class="text-muted text-hover-primary ml-4">Legal</a>
                            <a href="#" class="text-muted text-hover-primary ml-4">Contact</a>
                        </div> --}}
                    </div>
                    <!--end: Aside footer for desktop-->
                </div>
                <!--end: Aside Container-->
            </div>
            <div class="col-lg-9 col-md-8"  style="background-image: url({{ asset('assets/media/capellan/capellan-new-building-cropped.jpg') }}); background-size: cover; background-repeat: no-repeat;
            max-width:100%;">

            </div>
            <!--begin::Aside-->
            <!--end::Content-->
        </div>
        <!--end::Login-->
    </section>
    <!--end::Main-->




</body>
<!--end::Body-->

</html>
