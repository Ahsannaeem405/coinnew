<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- For Resposive Device -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- For Window Tab Color -->
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#1b1b1b">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#1b1b1b">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#1b1b1b">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" sizes="56x56" href="{{asset('d.png')}}">
    <!-- Main style sheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('crypto/css/style.css')}}">
    <!-- responsive style sheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('crypto/css/responsive.css')}}">

    <!-- Fix Internet Explorer ______________________________________-->
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="vendor/html5shiv.js"></script>
        <script src="vendor/respond.js"></script>
    <![endif]-->
    <title>@yield('title','Home')</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YR4VGQHK42"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YR4VGQHK42');
</script>
</head>

    <body>
    @section("head")
    <style type="text/css">

        body{
            background-color:#F0F2F8;;
                color: #8890a3;

        }

        td .btn{
        margin-top:6%;
        padding-bottom:8%;
        padding-top:8%;

        }

    </style>

        <div class="main-page-wrapper">
            <div class="Cryonik-header " style="padding: 17px 0 15px 0;background-color:#FFF;">
                <div class="container-fluid">
                    <div class="main-header-wrapper clearfix">
                        <div class="logo"><a href="{{url('/')}}">
                            <img src="{{asset('d.png')}}" alt="" width="49" style="width:125px;height:125px;margin-top:-25%;">
                        </a></div>

                        <!-- ================= Theme Menu Wrapper =================== -->
                        <div class="navbar navbar-expand-lg bsnav bsnav-sticky-slide float-right">
                            <button class="navbar-toggler toggler-spring"><span class="navbar-toggler-icon"></span></button>
                            <div class="collapse navbar-collapse">
                                <ul class="navbar-nav navbar-mobile mr-0">
                                    <li class="nav-item "><a class="{{ (request()->is('/')) ? 'active' : '' }} nav-link" href="{{url('/')}}" >Home</a></li>
                                    @if(Auth::user() and Auth::user()->role=='admin')
                                    <li class="nav-item"><a class="{{ (request()->is('admins/add_coin')) ? 'active' : '' }} nav-link" href="{{url('admins/add_coin')}}">Add Coin</a></li>
                                    @else
                                    <li class="nav-item"><a class="{{ (request()->is('user/add_coin')) ? 'active' : '' }} nav-link" href="{{url('user/add_coin')}}">Add Coin</a></li>
                                    @endif
                                    <li class="nav-item"><a class="{{ (request()->is('contact_us')) ? 'active' : '' }} nav-link" href="{{url('contact_us')}}">Promote</a></li>
                                    <li class="nav-item"><a class="{{ (request()->is('newsletter')) ? 'active' : '' }}
                                     nav-link" href="{{url('newsletter')}}">Newsletter</a></li>
                                    @if(Auth::user() and Auth::user()->role=='admin')
                                     <li class="nav-item"><a class="nav-link {{ (request()->is('admins/index')) ? 'active' : '' }}" href="{{url('admins/index')}}">Admin Home</a></li>
                                    @endif

                                    @if(Auth::user())
                                    <li class="nav-item">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"
                                            class="nav-link">{{ __('Logout') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none ">
                                                @csrf
                                        </form>

                                    </li>
                                    @else
                                     <li class="nav-item"><a  href="{{url('/log_in')}}" class="{{ (request()->is('log_in')) ? 'active' : '' }} nav-link ">Log in</a></li>
                                     <li class="nav-item"><a href="{{url('/regis')}}" class="nav-link {{ (request()->is('regis')) ? 'active' : '' }}">Register</a></li>



                                    @endif


                                     <!-- /.header-widget -->
                                </ul> <!-- /.navbar-nav -->


                            </div> <!-- /.navbar-collapse -->
                        </div> <!-- /.bsnav -->
                        <div id="login-md"><a href="{{url('log_in')}}">Log in</a></div>
                    </div> <!-- /.main-header-wrapper -->
                    <div class="bsnav-mobile">
                      <div class="bsnav-mobile-overlay"></div>
                      <div class="navbar"></div>
                    </div>
                </div> <!-- /.containe -->
            </div>

            @show

            @yield("body_content")
            @section("footer")

<div class="container mt-3">
    <div class="row">
@php

$footer = App\Models\Footer::find(1);

@endphp
                            <div class="col-lg-4 offset-md-4  col-12">
                            </div>
                            <div class="col-lg-4 offset-md-4  col-12">
                                    <p style="color: white;text-align: center;"><b>
                                        {{ $footer->slogan }}</b></p>
                                    <center>
                                    <img src="{{asset('admin/tw.svg')}}" width="40">
                                    <img src="{{asset('admin/te.svg')}}" width="40">
                                </center>

                                    <br>
                                    <a href="{{url('dis')}}" style="color:#8890a3;">Disclaimer</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="{{url('pp')}}" style="color:#8890a3;">Privacy Policy</a>&nbsp;&nbsp;&nbsp;
                                    <a href="{{url('tos')}}" style="color:#8890a3;">Terms of Use</a>


                            </div>
                            <div class="col-12" style="margin-bottom:7%;">
                                <center>
                                <p>{{ $footer->copyright }}</p></center>
                            </div>
                        </div>
</div>


             <!-- /.Cryonik-footer -->




        <!-- Optional JavaScript _____________________________  -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!-- jQuery -->

        <!-- Popper js -->
        <!-- Bootstrap JS -->
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
        </div> <!-- /.main-page-wrapper -->



    </body>

@show
</html>
