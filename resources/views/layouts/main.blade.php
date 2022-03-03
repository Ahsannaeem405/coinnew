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

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#1b1b1b">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#1b1b1b">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" sizes="56x56" href="{{asset('d.png')}}">

    <!-- Font Awosame kit -->
    <script src="https://kit.fontawesome.com/9838783293.js" crossorigin="anonymous"></script>

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
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                td .btn{
                margin-top:6%;
                }
            </style>

                <div class="main-page-wrapper">
                    <div class="Cryonik-header ">
                        <div class="logo"><a href="{{url('/')}}">
                                    <img src="{{asset('d.png')}}" alt=""  class="site-logo">
                                </a></div>
                        <div class="container-fluid p-0">
                            <div class="d-none d-lg-block">
                                <div class="d-flex justify-content-between py-2 px-4">
                                    <div class=" header-search ">
                                        <div class="input-group">
                                                <div class="input-group-prepend p-2">
                                                    <img src="{{asset('upload/images/search.png')}}" alt="search-btn"/>
                                                </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="auth d-flex">
                                    @if(Auth::user())
                                            
                                                    <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"
                                                        class="">{{ __('Logout') }}</a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none ">
                                                            @csrf
                                                    </form>

                                                @else
                                                <a  href="{{url('/log_in')}}" class="{{ (request()->is('log_in')) ? 'active' : '' }} nav-link ">Log in</a>
                                                <a href="{{url('/regis')}}" class="nav-link {{ (request()->is('regis')) ? 'active' : '' }}">Sign in</a>
                                                @endif
                                        
                                        </div>
                                </div>
                            </div>
                           
                        
                            <div class="main-header-wrapper clearfix">
                                <!-- ================= Theme Menu Wrapper =================== -->
                                <div class="navbar navbar-expand-lg bsnav bsnav-sticky-slide">
                                    <button class="navbar-toggler toggler-spring"><span class="navbar-toggler-icon"></span></button>
                                    
                                    <div class="collapse navbar-collapse py-2">
                                        <ul class="navbar-nav mr-auto ">
                                            <li class="nav-item "><a class="{{ (request()->is('/')) ? 'active' : '' }} nav-link" href="{{url('/token')}}" >Token</a></li>
                                        
                                            <li class="nav-item"><a class="{{ (request()->is('admins/add_coin')) ? 'active' : '' }} nav-link" href="{{url('/topgainer')}}">Topgainer</a></li>
                                            
                                            <li class="nav-item"><a class="{{ (request()->is('user/add_coin')) ? 'active' : '' }} nav-link" href="{{url('/promote')}}">Promoted</a></li>
                                            
                                            <li class="nav-item"><a class="{{ (request()->is('contact_us')) ? 'active' : '' }} nav-link" href="{{url('/new')}}">New</a></li>
                                            <li class="nav-item"><a class="{{ (request()->is('newsletter')) ? 'active' : '' }}
                                            nav-link  border-0 " href="{{url('/audit')}}">Audit</a></li>
                                        </ul>
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item "><a class="{{ (request()->is('/')) ? 'active' : '' }} nav-link" href="{{url('/KYC')}}" >KYC</a></li>
                                            <li class="nav-item"><a class="{{ (request()->is('admins/add_coin')) ? 'active' : '' }} nav-link" href="{{url('/')}}">BuyBol</a></li>       
                                            <li class="nav-item"><a class="{{ (request()->is('user/add_coin')) ? 'active' : '' }} nav-link" href="{{url('/FAQ')}}">FAQ</a></li>
                                            <li class="nav-item"><a class="{{ (request()->is('contact_us')) ? 'active' : '' }} nav-link" href="{{url('contact_us')}}">Contact Us</a></li>
                                            <li class="nav-item"><a class="{{ (request()->is('newsletter')) ? 'active' : '' }}
                                            nav-link  border-0 " href="{{url('/')}}">Telegram</a></li>
                                            <!-- @if(Auth::user() and Auth::user()->role=='admin')
                                            <li class="nav-item"><a class="nav-link {{ (request()->is('admins/index')) ? 'active' : '' }}" href="{{url('admins/index')}}">Admin Home</a></li>
                                            @endif -->

                                            <!-- @if(Auth::user())
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
                                            @endif -->


                                            <!-- /.header-widget -->
                                        </ul> <!-- /.navbar-nav -->
                                    </div> 
                                </div> <!-- /.bsnav -->
                                <!-- <div id="login-md"><a href="{{url('log_in')}}">Log in</a></div> -->
                            </div>
                            <div >

                            </div>
                            <div class="bsnav-mobile">
                                <div class="bsnav-mobile-overlay"></div>
                                <div class="navbar"><ul class="navbar-nav navbar-mobile mr-0">
                                    <div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Search here" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <li class="nav-item "><a class="{{ (request()->is('/')) ? 'active' : '' }} nav-link" href="{{url('/')}}" >Token</a></li>   
                                    <li class="nav-item"><a class="{{ (request()->is('admins/add_coin')) ? 'active' : '' }} nav-link" href="{{url('/')}}">Topgainer</a></li> 
                                    <li class="nav-item"><a class="{{ (request()->is('user/add_coin')) ? 'active' : '' }} nav-link" href="{{url('/')}}">Promoted</a></li>  
                                    <li class="nav-item"><a class="{{ (request()->is('contact_us')) ? 'active' : '' }} nav-link" href="{{url('/')}}">New</a></li>
                                    <li class="nav-item "><a class="{{ (request()->is('/')) ? 'active' : '' }} nav-link" href="{{url('/')}}" >KYC</a></li>
                                    <li class="nav-item"><a class="{{ (request()->is('admins/add_coin')) ? 'active' : '' }} nav-link" href="{{url('/')}}">BuyBol</a></li>       
                                    <li class="nav-item"><a class="{{ (request()->is('user/add_coin')) ? 'active' : '' }} nav-link" href="{{url('/')}}">FAQ</a></li>
                                    <li class="nav-item"><a class="{{ (request()->is('contact_us')) ? 'active' : '' }} nav-link" href="{{url('contact_us')}}">Contact Us</a></li>
                                    <li class="nav-item"><a class="{{ (request()->is('newsletter')) ? 'active' : '' }} nav-link  " href="{{url('')}}">Telegram</a></li>

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
                                </ul></div>
                            </div>
                        </div>
                        <div class="logo2">
                                <a href="{{url('/')}}">
                                    <img src="{{asset('logo2.png')}}" alt=""  class="site-logo">
                                </a>
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
                            <!-- <div class="col-lg-4 offset-md-4  col-12">
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


                            </div> -->
                            <div class="col-12 mb-2">
                                <center>
                                <p class="footer-text">{{ $footer->copyright }}</p></center>
                            </div>
                        </div>
</div>


             <!-- /.Cryonik-footer -->




        <!-- Optional JavaScript _____________________________  -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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

        <!-- owl carousal JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(".navbar-toggler").click(function(){
                $(".bsnav-mobile").toggleClass("in");
            });

            $('.owl-carousel1').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                dots: false,
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:false,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            })
            $('.play').on('click',function(){
            owl.trigger('play.owl.autoplay',[1500])
            })
            $('.stop').on('click',function(){
                owl.trigger('stop.owl.autoplay')
            })
        </script>

        <script>
            $('.owl-carousel2').owlCarousel({
                loop:true,
                margin:10,
                nav:false,
                dots: false,
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:false,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            })
            $('.play').on('click',function(){
            owl.trigger('play.owl.autoplay',[1000])
            })
            $('.stop').on('click',function(){
                owl.trigger('stop.owl.autoplay')
            })
        </script>
    </body>

@show
</html>
