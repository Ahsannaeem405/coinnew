@extends('../layouts/main')

@section('body_content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style type="text/css">
        .nav-tabs .nav-item .active{
            background-color: #999ba0  !important;
        }
        .sbn{
            width: 100%;
        }
        
        body a{
        color: black;
        }
.cap{
     font-size:30px;
 }
 tr td img{
    width:60px;
    height:60px;
    margin-right: 3%;
 }
 .tdd{
    text-align: center;
 }
 .tdd a{
     margin-top:14px;
 }
 .tdd a{
     margin-top:14px;
 }
 .tab-content {
     
      padding-left:8%;
      padding-right:8%;
  }
  input[type="search"]{
    height: calc(2.5rem + 2vh);
    color: #fff;
    padding-left: 2rem;
    font-size: 1.8rem;
    width: 17rem;
    border-radius: 1rem;
    float: right;
    margin-bottom: 2%;
    background-color: #999ba0;
    border:none;
    
  }
 @media screen and (max-width: 600px) {
 .som{
    display: none;
 }
 .btn-primary{
    padding: .15rem 0.3rem;
    font-size: 0.775rem;

 }
 table{
    font-size:0.60rem;
 }
 .table tbody tr td a img{
    width: 8px;
    height: 8px;
    object-fit: cover;
 }
 .tdd a{
     margin-top:8px;
 }
 .tddd a{
     margin-top:8px;
 }
 td .btn{
     
        margin-top:3%!important;
        padding:3%;
        

        }
    
  
 .table td, .table th {
    padding: .32rem;
  }
  .tab-content {
      margin-top:5%;
      padding-left:4%;
      padding-right:4%;
  }
 
  .log_ban{
    height:70px;  
  }
  input[type="search"]{
    height: calc(1.2rem + 1.2vh);
        font-size: 1rem;

    width: 9rem;
   
  }
      
  



}

    
   

        /* Paste this css to your style sheet file or under head tag */
/* This only works with JavaScript, 
if it's not present, don't show loader */

    </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
    <script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{asset('style.css')}}">
 
    <div class="se-pre-con"></div>
    @php
    // $images=App\Models\add_coin::whereNotNull('permote')->whereNotNull('approve')->take(1)->orderBy('id', 'DESC')->get(); 
    $images=App\Models\slider_img::orderBy('id', 'DESC')->get();
    $images3=App\Models\ban_slider_img::orderBy('id', 'DESC')->get();
    $images2=App\Models\add_coin::whereNotNull('permote')->whereNotNull('approve')->get();   
  
    @endphp

    @if(Session::has('success'))
        <div class="alert alert-success" style="width:100%;">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp 
       </div>
    @endif
    
                    <div class="container-fluid mt-3">
                        <div class="promoted-cash mx-1 mx-lg-4 ">
                            <div class="row  promoted-div1 m-0">
                                <div class="col-12 ">
                                    <h3>Promoted</h3>
                                </div>  
                                
                                <div class="col-12 d-block d-lg-none ">
                                    <div class="owl-carousel owl-carousel2 owl-theme">
                                        @foreach($images2 as $row_img3)
                                            <div class="item text-center mx-auto">  
                                            <a href="{{$row_img3->url}}" class="promoted-gig mx-auto">   
                                                <img class="" src="{{url($row_img3->logo_link)}}"></a>  
                                                <h5 class="my-1">{{$row_img3->name}}</h5> 
                                            </div> 
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-12 d-none d-lg-block py-4">
                                    <div class="row justify-content-center ">
                                        @php
                                            $imgCount=count($images2); 
                                            @endphp
                                         @foreach($images2 as $row_img3)
                                           
                                            <div class="col-lg-2 col-md-4 col-6  px-0  text-center">
                                                    <a href="{{url('coins', ['id'=>$row_img3->id])}}" class="promoted-gig mx-auto"> 
                                                    <img class="" src="{{url($row_img3->logo_link)}}"></a>
                                                    <h5 class="my-1">{{$row_img3->name}}</h5>
                                            </div> 
                                          
                                          
                                            @endforeach
                                            @for($i=$imgCount;$i<5;$i++)
                                            <div class="col-lg-2 col-md-4 col-6  px-0  text-center">
                                                    <a href="#" class="promoted-gig">
                                                    <img class=""src="{{url('upload/images/procash.png')}}"></a>
                                                    <h5 class="my-1">{{$row_img3->name}}</h5>
                                            </div> 
                                           
                                          @endfor
                                        </div>
                                
                                </div>
                               
                                
                                <div class="col-12 slider-div py-4">
                                    <div class="owl-carousel owl-carousel1 owl-theme">
                                            @foreach($images2 as $row_img)
                                                    <div class="item text-center mx-auto">  
                                                        <a href="{{url('coins', ['id'=>$row_img->id])}}">
                                                                <img class="img-fluid rounded " src="{{url('images/'.$row_img->image)}}"></a>        
                                                    </div>
                                            @endforeach  
                                    </div>
                                </div>
                            </div>
                           
                        </div>    
                    </div>


        @php

            $check=0;
            $dt=date('Y-m-d');
            $today = new DateTime($dt);
            $dtm=date('m');

           //////////current week/////////
           $monday = strtotime("last monday");
           $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
           $sunday = strtotime(date("Y-m-d",$monday)." +6 days");
           $this_week_sd = date("Y-m-d",$monday);
           $this_week_ed = date("Y-m-d",$sunday);
           $mon_start=date('Y-m-01', strtotime($dt));
           $mon_end=date('Y-m-t', strtotime($dt));





            $all_coin=App\Models\add_coin::whereNotNull('approve')->orderBy('vote', 'DESC')->get();
            $pre_coin=App\Models\add_coin::whereNotNull('approve')->whereNotNull('checkbox')->paginate(30);

            
            $all_coin2=App\Models\add_coin::whereNotNull('approve')->where('id', '>','100' )
               ->take(10)->get();
               
            $per_coin=App\Models\add_coin::whereNotNull('approve')->whereNotNull('permote')->orderBy('vote', 'DESC')->paginate(10);
            $per_coin2=App\Models\add_coin::whereNotNull('approve')->whereNotNull('permote')->orderBy('vote', 'DESC')->get();
            if(Auth::user())
            {
            $us=Auth::user()->id;
            }
            else{
            $us=0;
            }
            if(Auth::user())
            {
            $your_coin=App\Models\add_coin::where('created_by',Auth::user()->id)->get();
            }
            $today_coin=App\Models\add_coin::whereNotNull('approve')->orderBy('vote', 'DESC')->paginate(10);
            $today_coin_all=App\Models\add_coin::whereNotNull('approve')->orderBy('vote', 'DESC')->paginate(80);
            $weekly_coin=App\Models\add_coin::whereDate('created_at','>=',$this_week_sd)->whereDate('created_at','<=',$this_week_ed)->whereNotNull('approve')->orderBy('vote', 'DESC')->paginate(30);
            $weekly_coin2=App\Models\add_coin::whereDate('created_at','>=',$this_week_sd)->whereDate('created_at','<=',$this_week_ed)->whereNotNull('approve')->orderBy('vote', 'DESC')->take('120')->get();

            $monthly_coin=App\Models\add_coin::whereDate('created_at','>=',$mon_start)->whereDate('created_at','<=',$mon_end)->orderBy('vote', 'DESC')->whereNotNull('approve')->paginate(30);
            $monthly_coin2=App\Models\add_coin::whereMonth('created_at',$dtm)->orderBy('vote', 'DESC')->whereNotNull('approve')->take('200')->get();

           if(Session::has('id'))
           {
           $get_ses=Session::get('id');

           }
           else{
            $get_ses=0;

           }


           //$get_ip=DB::select("select * from ip_adds where ((created_at='$dt') and  ((user_id=$us)  or (user_id=$get_ses)))");

        @endphp
        <div class="container-fluid cony mt-lg-5 mt-0 pr-0 pl-1 px-lg-5 pt-0 pt-lg-0">
                
            <div class="table-responsive">
                <table class="w-100 mytable mt-5" id="promoted_1">    
                    <tr class="table-heading">
                        <td>Promoted</td>
                    </tr>
                    <thead class="my-2">
                        
                        <tr>
                            <th class="">#</th>
                            <th>Name</th>
                            <th>Symbol</th>
                            <th>Price</th>
                            <th>Launch</th>
                            <th>CMC | CG</th>
                            <th>Audit</th>
                            <th>KYC</th>
                            <th>vote</th>
                            <th>devote</th>
                            <th>more</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $a=1;
                        $xyz=0;
                        @endphp
                        @foreach($per_coin as $row_per)
                            @php $xyz++;
                                $i=1;
                            @endphp
                            <tr>

                                <td>{{ $i++}}</td>
                                <td >
                                   
                                         <a href="{{url('coins', ['id'=>$row_per->id])}}" class="name"><img src="{{$row_per->logo_link}}" class=""><b>{{$row_per->name}}</b></a>
                                  
                                   </td>

                                <td >
                                    <a href="{{url('coins', ['id'=>$row_per->id])}}">{{$row_per->sym}}</a>
                                  
                                </td>   
                                <td ><a href="{{url('coins', ['id'=>$row_per->id])}}">${{number_format($row_per->mark_cap , 2,'.', ',' )}}</a></td>
                                @php

                                    $later_row_per = new DateTime($row_per->launch_date);
                                    $diff_row_per = $today->diff($later_row_per)->format("%a");  @endphp
                                @if($row_per->launch_date<$dt)
                                    <td ><a href="{{url('coins', ['id'=>$row_per->id])}}">{{$diff_row_per}} days</a></td>
                                @elseif($row_per->launch_date==$dt)
                                    <td> Launch Today</td>
                                @else
                                    <td ><a href="{{url('coins', ['id'=>$row_per->id])}}">Launch in {{$diff_row_per}} days</a></td>

                                @endif
                                <td></td>
                                <td><button class="vote-btn">321</button></td>
                                <td><button class="vote-btn">321</button></td>
                                @if(Auth::user())
                                    @php


                                        $check=DB::select("select * from coin_votes where ((coin_id=$row_per->id) and ((user_id=$us) or (user_id=$get_ses)))");

                                        $check=count($check);

                                    @endphp

                                    @if($check==0)
                                        <td style="text-align:center;" class="vo1{{$row_per->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_per->id}}" type="button">🚀<span>{{$row_per->vote}}</span></button></a></td>
                                    @else
                                        <td style="text-align:center;" class="vo1{{$row_per->id}}"><button class="btn btn-sm sbn btn-primary un_vo1" abc="{{$row_per->id}}" type="button"><span>{{$row_per->vote}}</span></button></td>
                                    @endif
                                     {{--devote start--}}
                                     @if($check==0)
                                        <td style="text-align:center;" class="devote{{$row_per->id}}"><button class="sbn btn btn-sm btn-outline-danger devote  col-6" devote="{{$row_per->id}}" type="button"><span>{{$row_per->devote}}</span></button></td>
                                    @else
                                        <td style="text-align:center;" class="un_devote{{$row_per->id}}"><button class="btn btn-sm sbn btn-danger un_devote col-6" un_devote="{{$row_per->id}}" type="button">🚀<span>{{$row_per->devote}}</span></button></td>
                                    @endif    
                                @else
                                    @php


                                        $ses_check=App\Models\coin_vote::where('coin_id',$row_per->id)->where('user_id',$get_ses)->count();


                                    @endphp
                                    @if($ses_check==0)

                                        <td style="text-align: center;" class="vo1{{$row_per->id}}"><span abc="{{$row_per->id}}">{{$row_per->vote}}</span></a></td>
                                    @else
                                        <td style="text-align: center;" class="vo1{{$row_per->id}}"><span abc="{{$row_per->id}}">{{$row_per->vote}}</span></td>

                                    @endif
                                     {{--devote start--}}
                                     @if($ses_check==0)
                                        <td style="text-align:center;" class="devote{{$row_per->id}}"><span devote="{{$row_per->id}}">{{$row_per->devote}}</span></button></td>
                                    @else
                                        <td style="text-align:center;" class="un_devote{{$row_per->id}}"><span un_devote="{{$row_per->id}}">{{$row_per->devote}}</span></button></td>
                                    @endif    
                                @endif
                               
                                <td>  <a href="{{url('coins', ['id'=>$row_per->id])}}">Info</a></td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                    
                    
            </div>
            <div class="table-responsive">
                <table class="w-100 mytable mt-5"  id="myTable1">
                    <tr class="table-heading">
                        <td>Tokenlist</td>
                    </tr>
                    <thead>
                        <tr>
                            <th class="">#</th>
                            <th>Name</th>
                            <th >Symbol</th>
                            <th>Price</th>
                            <th>Launch</th>
                            <th>CMC | CG</th>
                            <th>Audit</th>
                            <th>KYC</th>
                           <th>vote</th>
                            <th>devote</th>
                            <th>more</th>
                        </tr>
                        </thead>
                        <tbody >
                        @php $al_kk=0;
                            $i=1;
                        @endphp
                        @foreach($today_coin as $row_today)
                        @php $al_kk++; @endphp
                        <tr>
                            <td>{{$i++}}</td>
                                <td ><a href="{{url('coins', ['id'=>$row_today->id])}}" class="name"><img src="{{$row_today->logo_link}}"  ><b>{{$row_today->name}}</b></a></td>
                                <td>
                                    <a href="{{url('coins', ['id'=>$row_today->id])}}">{{$row_today->sym}}</a>
                                  
                                </td> 
                                <td ><a href="{{url('coins', ['id'=>$row_today->id])}}">${{$row_today->mark_cap}}</a></td>
                                @php
                                    $later_row_today = new DateTime($row_today->launch_date);
                                    $diff_row_today= $today->diff($later_row_today)->format("%a");  @endphp
                                @if($row_today->launch_date<$dt)
                                    <td ><a href="{{url('coins', ['id'=>$row_today->id])}}">{{$diff_row_today}} days</a></td>
                                @elseif($row_today->launch_date==$dt)
                                    <td >Launch Today</td>
                                @else
                                    <td ><a href="{{url('coins', ['id'=>$row_today->id])}}">Launch in {{$diff_row_today}} days</a></td>

                                @endif
                                @php
                                    if(Auth::user())
                                    {
                                     $check1=DB::select("select * from coin_votes where ((coin_id=$row_today->id) and ((user_id=$us) or (user_id=$get_ses)))");
                                      
                                      $check1=count($check1);

                                    }
                                @endphp
                                 <td></td>
                                 <td></td>
                                <td></td>
                                @if(Auth::user())
                                    @php


                                        $check=DB::select("select * from coin_votes where ((coin_id=$row_today->id) and ((user_id=$us) or (user_id=$get_ses)))");

                                        $check=count($check);

                                    @endphp

                                    @if($check==0)
                                        <td style="text-align:center;" class="vo1{{$row_today->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_today->id}}" type="button"><span>{{$row_today->vote}}</span></button></a></td>
                                    @else
                                        <td style="text-align:center;" class="vo1{{$row_today->id}}"><button class="btn btn-sm sbn btn-primary un_vo1" abc="{{$row_today->id}}" type="button"><span>{{$row_today->vote}}</span></button></td>
                                    @endif
                                     {{--devote start--}}
                                     @if($check==0)
                                        <td style="text-align:center;" class="devote{{$row_today->id}}"><button class="sbn btn btn-sm btn-outline-danger devote  col-6" devote="{{$row_today->id}}" type="button"><span>{{$row_today->devote}}</span></button></td>
                                    @else
                                        <td style="text-align:center;" class="un_devote{{$row_today->id}}"><button class="btn btn-sm sbn btn-danger un_devote col-6" un_devote="{{$row_today->id}}" type="button"><span>{{$row_today->devote}}</span></button></td>
                                    @endif    
                                @else
                                    @php


                                        $ses_check=App\Models\coin_vote::where('coin_id',$row_today->id)->where('user_id',$get_ses)->count();


                                    @endphp
                                    @if($ses_check==0)

                                        <td style="text-align: center;" class="vo1{{$row_today->id}}"><span abc="{{$row_today->id}}">{{$row_today->vote}}</span></a></td>
                                    @else
                                        <td style="text-align: center;" class="vo1{{$row_today->id}}"><span abc="{{$row_today->id}}">{{$row_today->vote}}</span></td>

                                    @endif
                                     {{--devote start--}}
                                     @if($ses_check==0)
                                        <td style="text-align:center;" class="devote{{$row_today->id}}"><span devote="{{$row_today->id}}">{{$row_today->devote}}</span></button></td>
                                    @else
                                        <td style="text-align:center;" class="un_devote{{$row_today->id}}"><span un_devote="{{$row_today->id}}">{{$row_today->devote}}</span></button></td>
                                    @endif    
                                @endif
                               
                                <td><a href="{{url('coins', ['id'=>$row_today->id])}}">Info</a></td>
                            </tr>
                        @endforeach
                       
                        </tbody>
                </table>
            </div>
                    @if($xyz==10)
                    <div style="width: 100%;text-align: center;"><button class="sbn btn btn-sm btn-outline-primary set5" style="width:40%;margin-right: 0;margin-left: 0;">See All</button>
                    </div>
                @endif
          </div>

          <table class="table table-hover" style="display:none;" id="promoted_2">
                        <thead>
                        <tr>
                            <th style="text-align: left!important;"> Promoted Coins</th>
                            <th class="som">Symbol</th>
                            
                            <th>Market Cap</th>
                            <th>Launch</th>
                            <th>Votes</th>
                            <th>Devotes</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $a=1;  @endphp
                        @foreach($per_coin2 as $row_per)
                            <tr>
                                <td class="tddd"><a href="{{url('coins', ['id'=>$row_per->id])}}"><img src="{{$row_per->logo_link}}">{{$row_per->name}}</a></td></td>
                                <td class="tdd som">
                                    <a href="{{url('coins', ['id'=>$row_per->id])}}">{{$row_per->sym}}</a>
                                  
                                </td> 
                                <td class="tdd"><a href="{{url('coins', ['id'=>$row_per->id])}}">${{$row_per->mark_cap}}</a></td>
                                @php

                                    $later_row_per = new DateTime($row_per->launch_date);
                                    $diff_row_per = $today->diff($later_row_per)->format("%a");  @endphp
                                @if($row_per->launch_date<$dt)
                                    <td class="tdd"><a href="{{url('coins', ['id'=>$row_per->id])}}">{{$diff_row_per}} days</a></td>
                                @elseif($row_per->launch_date==$dt)
                                    <td class="tdd"> Launch Today</td>
                                @else
                                    <td class="tdd"><a href="{{url('coins', ['id'=>$row_per->id])}}">Launch in {{$diff_row_per}} days</a></td>

                                @endif



                                @if(Auth::user())
                                    @php


                                        $check=DB::select("select * from coin_votes where ((coin_id=$row_per->id) and ((user_id=$us) or (user_id=$get_ses)))");

                                        $check=count($check);

                                    @endphp

                                    @if($check==0)
                                        <td style="text-align:center;" class="vo1{{$row_per->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_per->id}}" type="button">🚀<span>{{$row_per->vote}}</span></button></a></td>
                                    @else
                                        <td style="text-align:center;" class="vo1{{$row_per->id}}"><button class="btn btn-sm sbn btn-primary un_vo1" abc="{{$row_per->id}}" type="button"><span>{{$row_per->vote}}</span></button></td>
                                    @endif
                                     {{--devote start--}}
                                     @if($check==0)
                                        <td style="text-align:center;" class="devote{{$row_per->id}}"><button class="sbn btn btn-sm btn-outline-danger devote  col-6" devote="{{$row_per->id}}" type="button"><span>{{$row_per->devote}}</span></button></td>
                                    @else
                                        <td style="text-align:center;" class="un_devote{{$row_per->id}}"><button class="btn btn-sm sbn btn-danger un_devote col-6" un_devote="{{$row_per->id}}" type="button">🚀<span>{{$row_per->devote}}</span></button></td>
                                    @endif    
                                @else
                                    @php


                                        $ses_check=App\Models\coin_vote::where('coin_id',$row_per->id)->where('user_id',$get_ses)->count();


                                    @endphp
                                    @if($ses_check==0)

                                        <td style="text-align: center;" class="vo1{{$row_per->id}}"><span abc="{{$row_per->id}}">{{$row_per->vote}}</span></a></td>
                                    @else
                                        <td style="text-align: center;" class="vo1{{$row_per->id}}"><span abc="{{$row_per->id}}">{{$row_per->vote}}</span></td>

                                    @endif
                                     {{--devote start--}}
                                     @if($check==0)
                                        <td style="text-align:center;" class="devote{{$row_per->id}}"><span devote="{{$row_per->id}}">{{$row_per->devote}}</span></button></td>
                                    @else
                                        <td style="text-align:center;" class="un_devote{{$row_per->id}}"><span un_devote="{{$row_per->id}}">{{$row_per->devote}}</span></button></td>
                                    @endif    
                                @endif
                            </tr>
                        @endforeach

                        </tbody>
                </table>
    <div class="plan-tabs-wrap pt-5">
        <div class="tab-content mt-5" id="myTabContent" >
            <div class="tab-pane fade show active " id="basic" role="tabpanel" aria-labelledby="basic-tab" style="border: 2px solid black;border-radius: 20px;/* box-shadow: 9px 23px 28px grey; */">
                <div class="table-responsive" >
                    <table class="table  table-hover"  id="myTable11" style="display:none;">


                        <thead>
                        <tr>
                            <th style="margin-left:3%;width:30%;padding-right:10%;">Asset</th>
                            <th class="som">Symbol</th>
                            <th>Market Cap</th>
                            <th>Time launch</th>
                            <th>Votes</th>
                            <th>Devotes</th>
                        </tr>
                        </thead>
                        <tbody class="myTable2">
                        @foreach($today_coin_all as $row_today)
                            <tr>
                                <td class="tddd"><a href="{{url('coins', ['id'=>$row_today->id])}}"><img src="{{$row_today->logo_link}}" ><b>{{$row_today->name}}</b></a></td>
                                <td class="tdd som">
                                    <a href="{{url('coins', ['id'=>$row_today->id])}}">{{$row_today->sym}}</a>
                                  
                                </td>
                                <td class="tdd"><a href="{{url('coins', ['id'=>$row_today->id])}}">${{$row_today->mark_cap}}</a></td>
                                @php

                                    $later_row_today = new DateTime($row_today->launch_date);
                                    $diff_row_today= $today->diff($later_row_today)->format("%a");  @endphp


                                @if($row_today->launch_date<$dt)
                                    <td class="tdd"><a href="{{url('coins', ['id'=>$row_today->id])}}">{{$diff_row_today}} days</a></td>
                                @elseif($row_today->launch_date==$dt)
                                    <td class="tdd">Launch Today</td>
                                @else
                                    <td class="tdd"><a href="{{url('coins', ['id'=>$row_today->id])}}">Launch in {{$diff_row_today}} days</a></td>

                                @endif
                                @php
                                    if(Auth::user())
                                    {
                                     $check1=DB::select("select * from coin_votes where ((coin_id=$row_today->id) and ((user_id=$us) or (user_id=$get_ses)))");

                                      $check1=count($check1);

                                    }



                                @endphp


                                @if(Auth::user())
                                    @if($check1==0)
                                        <td class="vo1{{$row_today->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_today->id}}" type="button">{{$row_today->vote}}</button></td>
                                    @else
                                        <td class="vo1{{$row_today->id}}"><button class="sbn btn btn-sm btn-primary un_vo1" abc="{{$row_today->id}}" type="button">{{$row_today->vote}}</button></td>
                                    @endif
                                     {{--devote start--}}
                                     @if($check==0)
                                        <td style="text-align:center;" class="devote{{$row_today->id}}"><button class="sbn btn btn-sm btn-outline-danger devote  col-6" devote="{{$row_today->id}}" type="button"><span>{{$row_today->devote}}</span></button></td>
                                    @else
                                        <td style="text-align:center;" class="un_devote{{$row_today->id}}"><button class="btn btn-sm sbn btn-danger un_devote col-6" un_devote="{{$row_today->id}}" type="button">🚀<span>{{$row_today->devote}}</span></button></td>
                                    @endif    
                                @else
                                    @php
                                        $see_check=App\Models\coin_vote::where('coin_id',$row_today->id)->where('user_id',$get_ses)->count();
                                    @endphp
                                    @if($see_check==0)
                                        <td class="vo1{{$row_today->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_today->id}}" type="button">{{$row_today->vote}}</button></td>
                                    @else
                                        <td class="vo1{{$row_today->id}}"><button class="sbn btn btn-sm btn-primary un_vo1" abc="{{$row_today->id}}" type="button">{{$row_today->vote}}</button></td>
                                    @endif
                                     {{--devote start--}}
                                     @if($check==0)
                                        <td style="text-align:center;" class="devote{{$row_today->id}}"><button class="sbn btn btn-sm btn-outline-danger devote  col-6" devote="{{$row_today->id}}" type="button"><span>{{$row_today->devote}}</span></button></td>
                                    @else
                                        <td style="text-align:center;" class="un_devote{{$row_today->id}}"><button class="btn btn-sm sbn btn-danger un_devote col-6" un_devote="{{$row_today->id}}" type="button">🚀<span>{{$row_today->devote}}</span></button></td>
                                    @endif    


                                @endif

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @if($al_kk==10)
                    <div style="width: 100%;text-align: center;"><button class="sbn btn btn-sm btn-outline-primary set15" style="width:40%;margin-right: 0;margin-left: 0;">See All</button>
                    </div>
                @endif
                </div>
            </div> <!-- /.tab-pane -->
            <div class="tab-pane fade"  id="blue" role="tabpanel" aria-labelledby="blue-tab">
                
                <div class="table-responsive ">
                    

                    <table class="table   table-hover"  id="myTable2">
                        

                        <thead>
                        <tr class="header">
                            <th style="margin-left:3%;width:30%;padding-right:10%;">Asset</th>
                            <th class="som">Symbol</th>
                            <th>Market Cap</th>
                            <th>Time launch</th>
                            <th>Votes</th>
                            <th>Devotes</th>
                        </tr>
                        </thead>

                        <tbody class="sell_all t1  myTable4" >

                        <style type="text/css">
                            td a{
                                display: block;
                                cursor: pointer;
                            }
                        </style>
                        @php $al_k=0; @endphp

                        @foreach($all_coin as $row)
                            @php $al_k++; @endphp

                            <tr id="cp{{$row->id}}">


                                <td class="tddd"><a href="{{url('coins', ['id'=>$row->id])}}"><img src="{{$row->logo_link}}" ><b>{{$row->name}}<b></a></td>
                                <td class="tdd som">
                                    <a href="{{url('coins', ['id'=>$row->id])}}">{{$row->sym}}</a>
                                  
                                </td>
                                <td class="tdd"><a href="{{url('coins', ['id'=>$row->id])}}">${{$row->mark_cap}}</a></td>
                                @php

                                    $later = new DateTime($row->launch_date);
                                    $diff_row = $today->diff($later)->format("%a");
                                @endphp
                                @if($row->launch_date<$dt)
                                    <td class="tdd"><a href="{{url('coins', ['id'=>$row->id])}}">{{$diff_row}} days</a></td>
                                @elseif($row->launch_date==$dt)
                                    <td class="tdd"> Launch Today</td>
                                @else
                                    <td class="tdd"><a href="{{url('coins', ['id'=>$row->id])}}">Launch in {{$diff_row}} days</a></td>

                                @endif



                                @php

                                    if(Auth::user())
                                    {
                                       $check=DB::select("select * from coin_votes where coin_id=$row->id or user_id=$us");

                                      $check=count($check);
                                    }
                                @endphp
                                @if(Auth::user())

                                    @if($check==0)
                                        <td class="vo1{{$row->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row->id}}" type="button">🚀{{$row->vote}}</button></td>
                                    @else
                                        <td class="vo1{{$row->id}}"><button class="btn btn-sm sbn btn-primary un_vo1" abc="{{$row->id}}" type="button">🚀{{$row->vote}}</button></a></td>
                                    @endif
                                       {{--devote start--}}
                                       @if($check==0)
                                        <td style="text-align:center;" class="devote{{$row->id}}"><button class="sbn btn btn-sm btn-outline-danger devote  col-6" devote="{{$row->id}}" type="button"><span>{{$row->devote}}</span></button></td>
                                    @else
                                        <td style="text-align:center;" class="un_devote{{$row->id}}"><button class="btn btn-sm sbn btn-danger un_devote col-6" un_devote="{{$row->id}}" type="button">🚀<span>{{$row->devote}}</span></button></td>
                                    @endif   
                                @else
                                    @php


                                        $ses_check=App\Models\coin_vote::where('coin_id',$row->id)->where('user_id',$get_ses)->count();


                                    @endphp
                                    @if($ses_check==0)
                                        <td class="vo1{{$row->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row->id}}" type="button">🚀{{$row->vote}}</button></td>
                                        @else
                                            <td class="vo1{{$row->id}}"><button class="btn btn-sm sbn btn-primary un_vo1" abc="{{$row->id}}" type="button">🚀{{$row->vote}}</button></a></td>
                                        @endif
                                     {{--devote start--}}
                                     @if($check==0)
                                        <td style="text-align:center;" class="devote{{$row->id}}"><button class="sbn btn btn-sm btn-outline-danger devote  col-6" devote="{{$row->id}}" type="button"><span>{{$row->devote}}</span></button></td>
                                    @else
                                        <td style="text-align:center;" class="un_devote{{$row->id}}"><button class="btn btn-sm sbn btn-danger un_devote col-6" un_devote="{{$row->id}}" type="button">🚀<span>{{$row->devote}}</span></button></td>
                                    @endif    



                                @endif
                            </tr>
                            @if($al_k==30)
                                   @break  
                                
                            @endif
                           
                        @endforeach


                        </tbody>

                        
                    </table>
                    
                    <div style="width: 100%;text-align: center;" class="cap1">
                            @if($al_k==30)
                                    <center> 
                                        <button class="sbn btn btn-sm btn-outline-primary set1" no_time="1" last_id="{{$all_coin[29]->id}}" style="width:40%;margin-right: 0;margin-left: 0;">Show More</button>
                                    </center>    
                                
                            @endif
                        </div>
                </div>
                
                
            </div> 

            @if(Auth::user())
                <div class="tab-pane fade " id="your" role="tabpanel" aria-labelledby="blue-tab">
                    <div class="table-responsive">
                        <table class="table table-hover">
                           
                                <thead>
                                <tr>
                                    <th>Asset</th>
                                    <th class="som">Symbol</th>
                                    <th>Market Cap</th>
                                    <th>Launch</th>
                                    <th>Status</th>
                                    <th>Votes</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($your_coin as $row_your)
                                    <tr>
                                        <td class="tddd"><a href="{{url('coins', ['id'=>$row_your->id])}}"><img src="{{$row_your->logo_link}}" >{{$row_your->name}}</a></td>
                                        <td class="tdd som"><a href="{{url('coins', ['id'=>$row_your->id])}}">${{$row_your->sym}}</a></td>
                                        <td class="tdd"><a href="{{url('coins', ['id'=>$row_your->id])}}">${{$row_your->mark_cap}}</a></td>
                                        @php

                                            $later_row_your = new DateTime($row_your->launch_date);
                                            $diff_row_your= $today->diff($later_row_your)->format("%a");  @endphp


                                        @if($row_your->launch_date<$dt)
                                            <td class="tdd"><a href="{{url('coins', ['id'=>$row_your->id])}}">{{$diff_row_your}} days</a></td>
                                        @elseif($row_your->launch_date==$dt)
                                            <td class="tdd">Launch Today</td>
                                        @else
                                            <td class="tdd"><a href="{{url('coins', ['id'=>$row_your->id])}}">Launch in {{$diff_row_your}} days</a></td>

                                        @endif

                                        @php
                                            if(Auth::user())
                                            {
                                                $checkyy=DB::select("select * from coin_votes where ((coin_id=$row_your->id) and ((user_id=$us) or (user_id=$get_ses)))");

                                                $checkyy=count($checkyy);

                                            }




                                        @endphp
                                        @if($row_your->approve==Null)
                                            <td class="tdd"><a href="{{url('coins', ['id'=>$row_your->id])}}">Waiting For Approval</a></td>
                                        @else
                                            <td class="tdd"><a href="{{url('coins', ['id'=>$row_your->id])}}">Active</a></td>
                                        @endif
                                        @if($checkyy==0)
                                            <td class="vo1{{$row_your->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1 col-6" abc="{{$row_your->id}}" type="button">{{$row_your->vote}}</button></td>
                                        @else
                                            <td class="vo1{{$row_your->id}}"><button class="sbn btn btn-sm btn-primary un_vo1 col-6" abc="{{$row_your->id}}" type="button">{{$row_your->vote}}</button></td>
                                        @endif

                                  
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn-sm btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                    <a class="dropdown-item" href="{{url('coin_edit', ['id'=>$row_your->id])}}">Edit</a>

                                                    <a class="dropdown-item" href="{{url('coin_del', ['id'=>$row_your->id])}}">Delete</a>
                                                </div>
                                            </div>
                                        </td>


                                    </tr>
                                @endforeach

                                </tbody>
                        </table>
                    </div>
                </div>
            @endif


            <div class="tab-pane fade" id="new" role="" aria-labelledby="basic-tab">
                <div class="table-responsive">
                    
                    <table class="table  table-hover "  id="myTable3">
                        
                        <thead>
                        <tr>
                            <th style="margin-left:3%;width:30%;padding-right:10%;">Asset</th>
                            <th class="som">Symbol</th>
                            <th>Market Cap</th>
                            <th>Time launch</th>
                            <th>Votes</th>
                            <th>Devotes</th>
                        </tr>
                        </thead>
                        <tbody class="myTable4 t_new1">
                        @php $we=0; @endphp
                        @foreach($monthly_coin as $row_wk)
                        @php $we++; @endphp
                            <tr>


                                <td class="tddd"><a href="{{url('coins', ['id'=>$row_wk->id])}}"><img src="{{$row_wk->logo_link}}" >
                                <b>{{$row_wk->name}}</b></a></td>
                                <td class="tdd som">
                                    <a href="{{url('coins', ['id'=>$row_wk->id])}}">{{$row_wk->sym}}</a>
                                  
                                </td>
                                <td class="tdd"><a href="{{url('coins', ['id'=>$row_wk->id])}}">${{$row_wk->mark_cap}}</a></td>
                                @php

                                    $later_row_wk = new DateTime($row_wk->launch_date);
                                    $diff_row_wk= $today->diff($later_row_wk)->format("%a");  @endphp

                                @if($row_wk->launch_date<$dt)
                                    <td class="tdd"><a href="{{url('coins', ['id'=>$row_wk->id])}}">{{$diff_row_wk}}days</a></td>
                                @elseif($row_wk->launch_date==$dt)
                                    <td class="tdd"> Launch Today</td>
                                @else
                                    <td class="tdd"><a href="{{url('coins', ['id'=>$row_wk->id])}}">Launch in {{$diff_row_wk}} days</a></td>

                                @endif




                                @php
                                    if(Auth::user())
                                    {
                                        $check3=DB::select("select * from coin_votes where ((coin_id=$row_wk->id) and ((user_id=$us) or (user_id=$get_ses)))");
                                       $check3=count($check3);
                                    }



                                @endphp
                                @if(Auth::user())
                                    @if($check3==0)

                                        <td class="vo1{{$row_wk->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1 col-6" abc="{{$row_wk->id}}" type="button">{{$row_wk->vote}}</button></td>
                                    @else
                                        <td class="vo1{{$row_wk->id}}"><button class="sbn btn btn-sm btn-primary un_vo1 col-6" abc="{{$row_wk->id}}" type="button">🚀{{$row_wk->vote}}</button></td>
                                    @endif
                                    @if($check3==0)

                                    <td class="devote{{$row_wk->id}}"><button class="sbn btn btn-sm btn-outline-danger devote col-6" devote="{{$row_wk->id}}" type="button">{{$row_wk->devote}}</button></td>
                                    @else
                                    <td class="un_devote{{$row_wk->id}}"><button class="sbn btn btn-sm btn-danger un_devote col-6" devote="{{$row_wk->id}}" type="button">{{$row_wk->devote}}</button></td>
                                    @endif
                                @else
                                    @php
                                        $see_check=App\Models\coin_vote::where('coin_id',$row_wk->id)->where('user_id',$get_ses)->count();
                                     
                                    @endphp
                                     @if($see_check==0)

                                    <td class="vo1{{$row_wk->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1 col-6" abc="{{$row_wk->id}}" type="button">{{$row_wk->vote}}</button></td>
                                    @else
                                    <td class="vo1{{$row_wk->id}}"><button class="sbn btn btn-sm btn-primary un_vo1 col-6" abc="{{$row_wk->id}}" type="button">🚀{{$row_wk->vote}}</button></td>
                                    @endif   

                                     @if($see_check==0)

                                    <td class="devote{{$row_wk->id}}"><button class="sbn btn btn-sm btn-outline-danger devote col-6" devote="{{$row_wk->id}}" type="button">{{$row_wk->devote}}</button></td>
                                    @else
                                    <td class="un_devote{{$row_wk->id}}"><button class="sbn btn btn-sm btn-danger un_devote col-6" devote="{{$row_wk->id}}" type="button">{{$row_wk->devote}}</button></td>
                                    @endif


                                @endif
                            </tr>
                            <style type="text/css">
                                .set3 , .set1{
                                    margin-top: 0%!important;
                                     padding-bottom:3px!important;
                                     padding-top:3px!important;
                                }
                            </style>
                           
                         @endforeach
                         
                        </tbody>
                    </table>
                    @if($we==30)
                        <div style="width: 100%;text-align: center;" class="cap_new1">  
                                    <center>

                                        <button class="sbn btn btn-sm btn-outline-primary set3" last_id="{{$monthly_coin[29]->id}}" style="width:40%;">See All</button>
                                    </center>
                                     
                            @endif
                        </div>
                </div>
                
            
            <div class="tab-pane fade" id="pre" role="" aria-labelledby="basic-tab">
                <div class="table-responsive">
                   
                    <table class="table table-hover "  id="">
                        
                        <thead>
                        <tr>
                            <th style="margin-left:3%;width:30%;padding-right:10%;">Asset</th>
                            <th class="som">Symbol</th>
                            <th>Market Cap</th>
                            <th>Time launch</th>
                            <th>Votes</th>
                            <th>Devotes</th>
                        </tr>
                        </thead>
                        <tbody class="myTable5">
                        @php $we=0; @endphp
                        @foreach($pre_coin as $row_wk)
                        @php $we++; @endphp
                            <tr>


                                <td class="tddd"><a href="{{url('coins', ['id'=>$row_wk->id])}}"><img src="{{$row_wk->logo_link}}" >
                                <b>{{$row_wk->name}}</b></a></td>
                                <td class="tdd som">
                                    <a href="{{url('coins', ['id'=>$row_wk->id])}}">{{$row_wk->sym}}</a>
                                  
                                </td>
                                <td class="tdd"><a href="{{url('coins', ['id'=>$row_wk->id])}}">Presale</a></td>
                                @php

                                    $later_row_wk = new DateTime($row_wk->launch_date);
                                    $diff_row_wk= $today->diff($later_row_wk)->format("%a");  @endphp

                                @if($row_wk->launch_date<$dt)
                                    <td class="tdd"><a href="{{url('coins', ['id'=>$row_wk->id])}}">{{$diff_row_wk}}days</a></td>
                                @elseif($row_wk->launch_date==$dt)
                                    <td class="tdd"> Launch Today</td>
                                @else
                                    <td class="tdd"><a href="{{url('coins', ['id'=>$row_wk->id])}}">Launch in {{$diff_row_wk}} days</a></td>

                                @endif




                                @php
                                    if(Auth::user())
                                    {
                                        $check3=DB::select("select * from coin_votes where ((coin_id=$row_wk->id) and ((user_id=$us) or (user_id=$get_ses)))");
                                       $check3=count($check3);
                                    }



                                @endphp
                                @if(Auth::user())
                                    @if($check3==0)

                                        <td class="vo1{{$row_wk->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_wk->id}}" type="button">{{$row_wk->vote}}</button></td>
                                    @else
                                        <td class="vo1{{$row_wk->id}}"><button class="sbn btn btn-sm btn-primary un_vo1" abc="{{$row_wk->id}}" type="button">🚀{{$row_wk->vote}}</button></td>
                                    @endif
                                             {{--devote start--}}
                                    @if($check3==0)
                                        <td style="text-align:center;" class="devote{{$row_wk->id}}"><button class="sbn btn btn-sm btn-outline-danger devote  col-6" devote="{{$row_wk->id}}" type="button"><span>{{$row_wk->devote}}</span></button></td>
                                    @else
                                        <td style="text-align:center;" class="un_devote{{$row_wk->id}}"><button class="btn btn-sm sbn btn-danger un_devote col-6" un_devote="{{$row_wk->id}}" type="button"><span>{{$row_wk->devote}}</span></button></td>
                                    @endif 
                                @else
                                    @php
                                        $see_check=App\Models\coin_vote::where('coin_id',$row_wk->id)->where('user_id',$get_ses)->count();
                                    @endphp
                                  @if($see_check==0)

                                    <td class="vo1{{$row_wk->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_wk->id}}" type="button">{{$row_wk->vote}}</button></td>
                                    @else
                                    <td class="vo1{{$row_wk->id}}"><button class="sbn btn btn-sm btn-primary un_vo1" abc="{{$row_wk->id}}" type="button">{{$row_wk->vote}}</button></td>
                                    @endif
                                    @if($see_check==0)
                                    <td style="text-align:center;" class="devote{{$row_wk->id}}"><button class="sbn btn btn-sm btn-outline-danger devote  col-6" devote="{{$row_wk->id}}" type="button"><span>{{$row_wk->devote}}</span></button></td>
                                    @else
                                        <td style="text-align:center;" class="un_devote{{$row_wk->id}}"><button class="btn btn-sm sbn btn-danger un_devote col-6" un_devote="{{$row_wk->id}}" type="button"><span>{{$row_wk->devote}}</span></button></td>
                                    @endif 

                                @endif
                            </tr>
                            <style type="text/css">
                                .set3 , .set1{
                                    margin-top: 0%!important;
                                     padding-bottom:3px!important;
                                     padding-top:3px!important;
                                }
                            </style>
                           
                         @endforeach
                         
                        </tbody>
                    </table>
                    @if($we==30)
                        <div style="width: 100%;text-align: center;" class="cap_new1">  
                                    <center>

                                        <button class="sbn btn btn-sm btn-outline-primary set3" last_id="{{$monthly_coin[29]->id}}" style="width:40%;">See All</button>
                                    </center>
                                     
                            @endif
                        </div>
                </div>
                
            </div>


        </div> <!-- /.tab-content -->
    </div>
    

   





    








   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.min.js"></script>


    <script type="text/javascript">
    
        $(document).ready(function(){
            var set=30;

                setInterval(function(){
                    set+=1;
                    console.log(set);

                   
                }, 1000);

            $(document).on("click",'.vo1' , function(){
                
                
                if(set>=1)
                {
                var ids=$(this).attr('abc');
                //alert(ids1)

                $.ajax({
                    type: 'get',
                    url:"{{ url('/vote') }}",

                    data: {'id':ids},

                    success: function (data) {
                        $('.vo1'+ids).empty();
                        var op =" ";
                 
                        op+='<button class="btn btn-sm sbn btn-primary un_vo1" type="button" abc='+data.id+'>'+data.dat+'</button>';
                        $('.vo1'+ids).append(op);
                        if(data.dat > 0)
                        {
                            $('.devote'+ids).empty();

                        var d =" ";
                        d+='<button class="btn btn-sm sbn btn-outline-danger devote col-6" type="button" devote='+data.id+'>'+data.devote+'</button>';
                        $('.devote'+ids).append(d);
                        //alert('vote ='+data.devote);
                        }

                    },
                });
                set=0;
            }
            else{
                alert('You Have To wait for 30s for next vote');
            }
            });
       
            $(document).on("click" ,'.un_vo1', function(){
                

            if(set>=1)
            {
                var ids=$(this).attr('abc');
                //alert(ids1)

                $.ajax({
                    type: 'get',
                    url:"{{ url('/un_vote') }}",

                    data: {'id':ids},

                    success: function (data) {
                        
                        $('.vo1'+ids).empty();
                        var op =" ";
                        op+='<button class="btn btn-sm sbn btn-outline-primary vo1" type="button" abc='+data.id+'>'+data.dat+'</button>';
                        $('.vo1'+ids).append(op);
                        // $('.devote'+ids).empty();
                        // var d =" ";
                        // d+='<button class="btn btn-sm sbn btn-danger un_devote col-6" type="button" un_devote='+data.id+'>'+data.devote+'</button>';
                        // $('.devote'+ids).append(d);
                        // $('.vo1'+ids).text(data.devote);
                        // alert(data.devote);

                    },
                });
                set=0;
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



@endsection