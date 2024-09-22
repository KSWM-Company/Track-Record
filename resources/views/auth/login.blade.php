
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>WASTIE</title>
    <meta name="description" content="Login">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <!-- base css -->
    <link rel="stylesheet" media="screen, print" href="{{asset('admins/css/vendors.bundle.css')}}">
    <link rel="stylesheet" media="screen, print" href="{{asset('admins/css/app.bundle.css')}}">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('admins/img/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('admins/img/favicon/favicon-32x32.png')}}">
    <link rel="mask-icon" href="{{asset('admins/img/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <!-- Optional: page related CSS-->
    <link rel="stylesheet" media="screen, print" href="{{asset('admins/css/page-login.css')}}">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    {{-- toastr --}}
    <link rel="stylesheet" media="screen, print" href="{{asset('admins/css/notifications/toastr/toastr.css')}}">

</head>
<body>

    <div class="blankpage-form-field">
        <div class="blankpage-footer text-center">
            <img src="{{asset('/admins/img/WASTIE-LOGO.png')}}" alt="" height="100" >
            <h2 style="color: green">Wastie Collection</h2>
        </div>
        <div class="card ">
            {{--  <div class="card p-5 rounded-plus bg-faded">  --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="username">@lang('lang.user_id')</label>
                    <span style="color: red">*</span>
                    <input id="cs_id" type="text" class="form-control  @error('cs_id') is-invalid @enderror" name="cs_id" value="{{ old('cs_id') }}" required autocomplete="cs_id">
                    @error('cs_id')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <span style="color: red">*</span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group text-left">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="rememberme">
                        <label class="custom-control-label" for="rememberme"> Remember me</label>
                    </div>
                </div>
                <div class="row no-gutters ">
                    <div class="col-md-12  ">
                        <button disabled id="submit" type="submit" class="btn  btn-block btn-lg btn btn-success">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="blankpage-footer text-center">
            <a href="#">
                <strong>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </strong>
            </a>
        </div>
        </div>
        <div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
            2024 © WASTIE by&nbsp;<a href='www' class='text-white opacity-40 fw-500' title='gotbootstrap.com'
                target='_blank'>Team</a>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- toastr --}}
    <script src="{{asset('admins/js/notifications/toastr/toastr.js')}}"></script>
    {!! Toastr::message() !!}
<script>
    $(document).ready(function() {
        const input1 = $("#password");
        const input2 = $("#cs_id");
        const submitButton = $("#submit");

        // Function to check if any of the input fields are empty
        function checkInputs() {
            const value1 = input1.val();
            const value2 = input2.val();
            submitButton.prop("disabled", value1 === "" || value2 === "");
        }

        // Call the checkInputs function when either input1 or input2 changes
        input1.on("keyup", checkInputs);
        input2.on("keyup", checkInputs);
        // Initial check on page load
        checkInputs();
    });
</script>
    {{-- <video poster="img/backgrounds/clouds.png" id="bgvid" playsinline autoplay muted loop>
        <source src="media/video/cc.webm" type="video/webm">
        <source src="media/video/cc.mp4" type="video/mp4">
    </video> --}}
    {{-- <div id="app">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <video poster="img/backgrounds/clouds.png" id="bgvid" playsinline autoplay muted loop>
            <source src="media/video/cc.webm" type="video/webm">
            <source src="media/video/cc.mp4" type="video/mp4">
        </video>
        <script src="{{asset('admins/js/vendors.bundle.js')}}"></script>
        <script src="{{asset('admins/js/app.bundle.js')}}"></script>
        <!-- Page related scripts -->
    </div> --}}

</body>
</html>
