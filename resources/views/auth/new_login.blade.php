
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
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

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form action="index.html">
				<img src="img/avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
                            <form method="POST" action="{{ route('login') }}">
                            @csrf
           		   		    <input id="email" class="input" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                              @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i">
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input id="password" class="input" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                           @error('password')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror>
            	   </div>
            	</div>
                <div class="form-group text-left">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="rememberme">
                        <label class="custom-control-label" for="rememberme"> Remember me</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-info btn-block btn-lg">
                    {{ __('Login') }}
                </button>
            </div>
        </div>
        <div class="blankpage-footer text-center ">
            <a href="#">
                <strong>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request')}}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </strong>
            </a>
            </form>


        </div>
    </div>
</div>
    <div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
        2024 © WASTIE by&nbsp;<a href='www' class='text-white opacity-40 fw-500' >Team</a>
    </div></div>
    <script type="text/javascript" src="js/main.js"></script>
    <script src="{{asset('admins/js/vendors.bundle.js')}}"></script>
    <script src="{{asset('admins/js/app.bundle.js')}}"></script>


</body>
</html>
