@extends('../layouts/main')
@section('title')
Log in
@endsection 

@section('body_content')

<link rel="icon" type="image/png" href="images/icons/favicon.ico" />

    <link rel="stylesheet" type="text/css" href="{{asset('login_sr/vendor/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('login_sr/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('login_sr/vendor/animate/animate.css')}}">


    <link rel="stylesheet" type="text/css" href="{{asset('login_sr/vendor/animsition/css/animsition.min.css')}}">



    <link rel="stylesheet" type="text/css" href="{{asset('login_src/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login_src/css/main.css')}}">
<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">

                <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" action="{{ route('login') }}" method="POST">
                    @csrf
                    <span class="login100-form-title">
                    Sign In
                    </span>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                        <input type="text" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Your Email">
                        <span class="focus-input100"></span>
                         @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter password">
                        <input type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Your Password">
                        <span class="focus-input100"></span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="text-right p-t-13 p-b-23">
                        <span class="txt1">
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                        Sign in
                        </button>
                </div>
                    <div class="flex-col-c p-t-170 p-b-40">
                        <span class="txt1 p-b-9">
                         Don’t have an account?
                        </span>
                                <a href="{{url('regis')}}" class="txt3">
                                Sign up now
                                </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
   



@endsection   

@section("footer")
        <!-- Optional JavaScript _____________________________  -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!-- jQuery -->
        
        <!-- Popper js -->
        <script src="{{asset('crypto/vendor/popper.js/popper.min.js')}}"></script>
        <!-- Bootstrap JS -->
        <script src="{{asset('crypto/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
        <!-- menu  -->
        <script src="{{asset('crypto/vendor/bsnav-master/bsnav.min.js')}}"></script>
        <!-- Dropdown Selector  -->
        <script src="{{asset('crypto/vendor/chosen/chosen.jquery.min.js')}}"></script>
        <!-- Font-awesome -->
        <script src="{{asset('crypto/fonts/fontawesome/js/all.min.js')}}"></script>
        <!-- Range Slider -->
        <script src="{{asset('crypto/vendor/ion.rangeSlider/ion.rangeSlider.js')}}"></script>
        <!-- WOW js -->
        <script src="{{asset('crypto/vendor/WOW-master/dist/wow.min.js')}}"></script>
        <!-- owl.carousel -->
        <script src="{{asset('crypto/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
        <!-- js count to -->
        <script src="{{asset('crypto/vendor/jquery.appear.js')}}"></script>
        <script src="{{asset('crypto/vendor/jquery.countTo.js')}}"></script>
        <!-- Fancybox -->
        <script src="{{asset('crypto/vendor/fancybox/dist/jquery.fancybox.min.js')}}"></script>

        <!-- Theme js -->
        <script src="{{asset('crypto/js/theme.js')}}"></script>


@endsection   
