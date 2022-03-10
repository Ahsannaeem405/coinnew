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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
                                         
                                            
                                                <form method="post" action="{{url('/user/searchCoin')}}">
                                                    @csrf
                                                    <div class="input-group">
                                                    <button type="submit" class="">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="fa fa-search text-white" aria-hidden="true"></i>    
                                                        </span>
                                                    </button> 
                                                    <input type="text" name="searchCoin"  class="form-control" placeholder="Seacrh" aria-label="Username" aria-describedby="basic-addon1">
                                                    </div>
                                                </form> 
                                            
                                       
                                    </div>   
                                        <div class="auth     d-flex">

                                            @if(Auth::user())
                                            <a class="{{ (request()->is('contact_us')) ? 'active' : '' }} nav-link" href="{{url('/user/add_coin')}}">Add Coin</a>

                                                    <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"
                                                        class="nav-link">{{ __('Logout') }}</a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none ">
                                                            @csrf
                                                    </form>

                                                @else
                                                <a  href="{{url('/log_in')}}" class="{{ (request()->is('log_in')) ? 'active' : '' }} nav-link ">Log in</a>
                                                <a href="{{url('/regis')}}" class="nav-link {{ (request()->is('regis')) ? 'active' : '' }}">Sign Up</a>
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
                                            <li class="nav-item"><a class="{{ (request()->is('admins/add_coin')) ? 'active' : '' }} nav-link" href="{{url('/user/buy_bot')}}">BuyBot</a></li>       
                                            <li class="nav-item"><a class="{{ (request()->is('user/add_coin')) ? 'active' : '' }} nav-link" href="{{url('/FAQ')}}">FAQ</a></li>
                                            <li class="nav-item"><a class="{{ (request()->is('contact_us')) ? 'active' : '' }} nav-link" href="{{url('contact_us')}}">Contact Us</a></li>
                                            <li class="nav-item"><a class="{{ (request()->is('newsletter')) ? 'active' : '' }}
                                            nav-link  border-0 " href="{{url('/mytelegram')}}">Telegram</a></li>
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
                                <div class="navbar "><ul class="navbar-nav navbar-mobile mr-0">
                                    <div>
            
                                        <form method="post" action="{{url('/user/searchCoin')}}">
                                                    @csrf
                                                    <div class="input-group mt-4">
                                        <div class="input-group-prepend">
                                            <button  type="submit" class="mobile-bar-search">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa fa-search text-white" aria-hidden="true"></i>    
                                                </span>
                                            </button> 
                                        </div>
                                        <input type="text" name="searchCoin" class="form-control" placeholder="Seacrh" >
                                        </div>
                                        </form>
                                    
                                    <li class="nav-item "><a class="{{ (request()->is('/')) ? 'active' : '' }} nav-link" href="{{url('/token')}}"  >Token</a></li>   
                                    <li class="nav-item"><a class="{{ (request()->is('admins/add_coin')) ? 'active' : '' }} nav-link" href="{{url('/topgainer')}}">Topgainer</a></li> 
                                    <li class="nav-item"><a class="{{ (request()->is('user/add_coin')) ? 'active' : '' }} nav-link" href="{{url('/promote')}}">Promoted</a></li>  
                                    <li class="nav-item"><a class="{{ (request()->is('contact_us')) ? 'active' : '' }} nav-link" href="{{url('/new')}}">New</a></li>
                                    <li class="nav-item "><a class="{{ (request()->is('/')) ? 'active' : '' }} nav-link" href="{{url('/audit')}}" >Audit</a></li>
                                    <li class="nav-item "><a class="{{ (request()->is('/')) ? 'active' : '' }} nav-link" href="{{url('/KYC')}}" >KYC</a></li>
                                    <li class="nav-item"><a class="{{ (request()->is('admins/add_coin')) ? 'active' : '' }} nav-link" href="{{url('/user/buy_bot')}}">BuyBot</a></li>       
                                    <li class="nav-item"><a class="{{ (request()->is('user/add_coin')) ? 'active' : '' }} nav-link" href="{{url('/FAQ')}}">FAQ</a></li>
                                    <li class="nav-item"><a class="{{ (request()->is('contact_us')) ? 'active' : '' }} nav-link"  href="{{url('contact_us')}}">Contact Us</a></li>
                                    <li class="nav-item"><a class="{{ (request()->is('newsletter')) ? 'active' : '' }} nav-link  " href="{{url('/mytelegram')}}">Telegram</a></li>
                                    @if(Auth::user())


                                    <a class="{{ (request()->is('contact_us')) ? 'active' : '' }} nav-link" href="{{url('user/add_coin')}}">Add Coin</a>
                                    @endif
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
                                            <li class="nav-item"><a href="{{url('/regis')}}" class="nav-link {{ (request()->is('regis')) ? 'active' : '' }}">Sign Up</a></li>
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
@if( isset($footer))

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

    @endif
             <!-- /.Cryonik-footer -->

<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="reportmsg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="d-flex justify-content-center">
                <form action="?" method="POST">
                    <div id="html_element"></div>
                   
                  </form>
                  <input type="hidden" class="vote" value="">
                  <input type="hidden" class="un_vote" value="">
            </div>
              <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
                  async defer>
              </script>
        </div>
 
      </div>
    </div>
  </div>


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
        
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.min.js"></script>


    <script type="text/javascript">
        var onloadCallback = function() {
          grecaptcha.render('html_element', {
            'sitekey' : '6LekpsYeAAAAAFU1m5oz7lYG-hOvQMcHm2xxH02b',
            'callback' : correctCaptcha
          });
       
        };

        var correctCaptcha = function(response) {
            $('#reportmsg').modal('hide');
            grecaptcha.reset();
            var ids=$('.vote').val();
     
         if(ids != ''){
                $.ajax({
                    type: 'get',
                    url:"{{ url('/vote') }}",

                    data: {'id':ids},

                    success: function (data) {
                        $('.vo1'+ids).empty();
                        var op =" ";
                 
                        op+='<button class="btn btn-sm sbn btn-primary un_vo1 col-12 col-lg-6" type="button" abc='+data.id+'>'+data.dat+'</button>';
                        $('.vo1'+ids).append(op);
                        if(data.dat > 0)
                        {
                            $('.devote'+ids).empty();

                        var d =" ";
                        d+='<button class="btn btn-sm sbn btn-outline-danger devote col-12 col-lg-6" type="button" devote='+data.id+'>'+data.devote+'</button>';
                        $('.devote'+ids).append(d);
                        $('.vote').val('');
                        //alert('vote ='+data.devote);
                        }

                    },
                });
            }else{
                var ids=$('.un_vote').val();
              
                       $.ajax({

                    type: 'get',
                    url:"{{ url('/un_vote') }}",

                    data: {'id':ids},

                    success: function (data) {
                        
                        $('.vo1'+ids).empty();
                        var op =" ";
                        op+='<button class="btn btn-sm sbn btn-outline-primary vo1" type="button" abc='+data.id+'>'+data.dat+'</button>';
                        $('.vo1'+ids).append(op);
                        $('.un_vote').val('');

                    },
                });
            }
        }
      </script>

    <script type="text/javascript">
    
        $(document).ready(function(){
            var set=30;

                setInterval(function(){
                    set+=1;

                   
                }, 1000);

            $(document).on("click",'.vo1' , function(){
                $('#reportmsg').modal('show');
                var ids=$(this).attr('abc');
                $('.vote').val(ids);
                if(set>=30)
                {
               
                set=0;
            }
            else{
                alert('You Have To wait for 30s for next vote');
            }
            });
       
            $(document).on("click" ,'.un_vo1', function(){
                $('#reportmsg').modal('show');
                var ids=$(this).attr('abc');
                $('.un_vote').val(ids);
             if(set>=30)
             {
            //     var ids=$(this).attr('abc');
            //     $.ajax({
            //         type: 'get',
            //         url:"{{ url('/un_vote') }}",

            //         data: {'id':ids},

            //         success: function (data) {
                        
            //             $('.vo1'+ids).empty();
            //             var op =" ";
            //             op+='<button class="btn btn-sm sbn btn-outline-primary vo1" type="button" abc='+data.id+'>'+data.dat+'</button>';
            //             $('.vo1'+ids).append(op);
                   

            //         },
            //     });
            //     set=0;
             }
            else{
                alert('You Have To wait for 30s for next vote');
            }
            });

            $(document).on("click",'.devote' , function(){
                


                if(set>=1)
                {
                var ids=$(this).attr('devote');
            
                $.ajax({
                    type: 'get',
                    url:"{{ url('/devote') }}",

                    data: {'id':ids},

                    success: function (data) {
                     

                        $('.devote'+ids).empty();
                        var op =" ";
                        op+='<button class="btn btn-sm sbn btn-danger un_devote col-6" type="button" un_devote='+data.id+'>'+data.dat+'</button>';
                        $('.devote'+ids).append(op);
                        if(data.dat > 0)
                        {
                        $('.vo1'+ids).empty();
                        var v =" ";
                        v+='<button class="btn btn-sm sbn btn-outline-primary vo1" type="button" abc='+data.id+'>'+data.vote+'</button>';
                        $('.vo1'+ids).append(v);
                        //alert('devote ='+data.vote);

                    //     $('.devote'+ids).text(data.vote);
                    //    alert(data.vote);
                        }

                    },
                });
                set=0;
            }
            else{
                alert('You Have To wait for 30s for next vote');
            }
            });

            $(document).on("click",'.un_devote' , function(){
                
                
                if(set>=1)
                {
                var ids=$(this).attr('un_devote');
              

                $.ajax({
                    type: 'get',
                    url:"{{ url('/un_devote') }}",

                    data: {'id':ids},

                    success: function (data) {
                        $('.devote'+ids).empty();
                        var op1 =" ";
                        op1+='<button class="btn btn-sm sbn btn-outline-danger devote col-6" type="button" devote='+data.id+'>'+data.dat+'</button>';
                        $('.devote'+ids).append(op1);



                    },
                });
                set=0;
            }
            else{
                alert('You Have To wait for 30s for next vote');
            }
            });
            
            $(document).on("click" ,'.set1', function(){

           
                var ids=$(this).attr('last_id');
                var no_time=$(this).attr('no_time');
               

                $.ajax({
                    type: 'get',
                    url:"{{ url('/user/get_see_all') }}",

                    data: {'id':no_time},

                    success: function (data) {
                    $('.cap1').empty();
                    $(".t1").append(data);


                    },
                  });
                
              });
            $(document).on("click" ,'.set2', function(){
                $("#myTable4").hide();
                $(".set2").hide();
                document.getElementById("myTable41").style.display = "inline-table";


            });
            $(document).on("click" ,'.set3', function(){
               var ids=$(this).attr('last_id');
                

                $.ajax({
                    type: 'get',
                    url:"{{ url('/user/get_see_all_new') }}",

                    data: {'id':ids},

                    success: function (data) {
                    $('.cap_new1').remove();
                    $(".t_new1").append(data);


                    },
                  });


            });
            
               $(document).on("click" ,'.set5', function(){
                $("#promoted_1").hide();
                $(".set5").hide();
                document.getElementById("promoted_2").style.display = "inline-table";


            });
              $(document).on("click" ,'.set15', function(){
                $("#myTable1").hide();
                $("#myInput1").hide();

                
                $(".set15").hide();
                document.getElementById("myTable11").style.display = "inline-table";
                document.getElementById("myInput11").style.display = "inline-table";



            });
            
            $(document).on("click" ,'.blue', function(){
                $("#myInput1").hide();
                $("#myInput11").hide();
                $("#myInput4").hide();
                 $("#myInput3").hide();
                
                
                document.getElementById("myInput2").style.display = "inline-table";
              
            });
             $(document).on("click" ,'.new', function(){
                $("#myInput1").hide();
                $("#myInput11").hide();
                $("#myInput2").hide();
                $("#myInput4").hide();
                
                document.getElementById("myInput3").style.display = "inline-table";
              
            });
            $(document).on("click" ,'.pre', function(){
                $("#myInput1").hide();
                $("#myInput11").hide();
                $("#myInput2").hide();
                $("#myInput3").hide();
                document.getElementById("myInput4").style.display = "inline-table";
            });
        });
    </script>
    <script>
        function myFunction_s1() {
            var x = document.getElementById("mydiv1");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        function myFunction_s2() {
            var x = document.getElementById("mydiv2");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        function myFunction_s3() {
            var x = document.getElementById("mydiv3");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        function myFunction_s4() {
            var x = document.getElementById("mydiv4");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            
            

         
            


            $("#myInput1").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".myTable1 tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            $("#myInput11").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".myTable2 tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            $("#myInput2").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".myTable3 tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            $("#myInput3").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".myTable4 tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
             $("#myInput4").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".myTable5 tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

    <script>
        try {
            fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
                return true;
            }).catch(function(e) {
                var carbonScript = document.createElement("script");
                carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
                carbonScript.id = "_carbonads_js";
                document.getElementById("carbon-block").appendChild(carbonScript);
            });
        } catch (error) {
            console.log(error);
        }
    </script>
    <!--scripts loaded here-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{asset('carousel.js')}}"></script>
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>


<script src="https://www.google.com/recaptcha/api.js"></script>

 <script>
   function onSubmit(token) {
      
     document.getElementById("demo-form").submit();
   }
 </script>
 <script src="https://www.google.com/recaptcha/api.js?render=6LeU4hYcAAAAAFmezD07HzyttdxsoQa1il_qynJi"></script>
    <script>
      function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('6LeU4hYcAAAAAOS2FHGn-OF0mbZVmqHkGJXt7Ufi',{action: 'submit'}).then(function(token) {
              // Add your logic to submit to your backend server here.
          });
        });
      }
  </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                autoplay:false,
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
                autoplay: false,
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
