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
                                            <div class="item text-center mx-auto py-2">  
                                            <a href="{{$row_img3->url}}" class="promoted-gig mx-auto">   
                                                <img class="" src="{{url($row_img3->logo_link)}}"></a>  
                                                <h5 class="my-1">{{$row_img3->name}}</h5> 
                                            </div> 
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-12 d-none d-lg-block py-4">
                                    <div class="row justify-content-center ">
                                        @if(isset($images2) && count($images2) > 0)
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
                                          @endif
                                        </div>
                                
                                </div>
                              

                                <div class="col-12 slider-div py-4">
                                    <div class="owl-carousel owl-carousel1 owl-theme d-block">
                                            
                                        @foreach($images2 as $row_img)
                                                    <div class="item text-center mx-auto">  
                                                        <a href="{{url('coins', ['id'=>$row_img->id])}}">
                                                                <img class=" rounded " src="{{asset('images')}}/{{$row_img->image}}"></a>        
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
                $check_coin=App\Models\add_coin::get();
                if(isset( $check_coin) && count( $check_coin)>0)
                {
                    $your_coin=App\Models\add_coin::where('created_by',Auth::user()->id)->get();

                }
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
        <div class="container-fluid cony mt-lg-5 mt-0 px-1 px-lg-5 pt-0 pt-lg-0">
                
            
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
                         
                            <th>Vote</th>
                            {{-- <th>devote</th> --}}
                            <th>More</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $a=1;
                        $xyz=0;
                        $i=1;
                        @endphp
                            
                        @foreach($per_coin as $row_per)
                        @php $xyz++;
                            
                            @endphp
                            <tr>

                                <td>{{ $row_per->id}}</td>
                                <td >
                                   
                                         <a href="{{url('coins', ['id'=>$row_per->id])}}" class="name py-2"><img src="{{$row_per->logo_link}}" class="">{{$row_per->name}}</a>
                                  
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
                                    <td ><a href="{{url('coins', ['id'=>$row_per->id])}}">{{$diff_row_per}} days</a></td>

                                @endif
                              
                                @if(Auth::user())
                                    @php
                                        $check=DB::select("select * from coin_votes where ((coin_id=$row_per->id) and ((user_id=$us) or (user_id=$get_ses)))");
                                        //$check_user=App\Models\coin_vote::where('coin_id',$row_per->id)->where('user_id',$us)->orwhere('user_id',$get_ses)->get();

                             
                              
                                // dd($check);
                                   
                $c_date=date('Y-m-d'); 
                if(isset($check[0]))
                {
                    $startDate= date('Y-m-d H:i:s', strtotime($check[0]->created_at));
                    $start_date=Carbon\Carbon::parse($startDate)->format('Y-m-d');
                    $start_time=Carbon\Carbon::parse($startDate)->format('H:i:s');
                    $time=explode(':',$start_time);
                    $hours=$time[0];
                    $mint=$time[1];
                    $seconds=$time[2];
                
                    $end_time=Carbon\Carbon::parse($startDate)->addHour(24)->format('Y-m-d H:i:s');

                    $end_date=Carbon\Carbon::parse($startDate)->addHour(24)->format('Y-m-d');
                    // dd( $time,$start_date,$start_time,$end_date);
                    $first = Carbon\Carbon::create($startDate, $hours,$mint, $seconds);
                    $second = Carbon\Carbon::create($end_date, $hours, $mint, $seconds);
                    $to = Carbon\Carbon::now();
                    $time=Carbon\Carbon::create($to)->between($first, $second);
                }else{
                    $time=false;
                }
               
            //    dd($time);
            //   dd(Carbon\Carbon::create($to)->between($first, $second), $start_date, $end_date);
                @endphp
                @if($time)
                <td style="text-align:center;" class="vo1{{$row_per->id}}"><button class="btn btn-sm sbn btn-danger  col-12 col-lg-6" abc="{{$row_per->id}}" type="button"><span>{{$row_per->vote}}</span></button></td>

                  @else 
                                @if($check==0)
                                        <td style="text-align:center;" class="vo1{{$row_per->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1 col-12 col-lg-6" abc="{{$row_per->id}}" type="button"><span>{{$row_per->vote}}</span></button></a></td>
                                    @else
                                        <td style="text-align:center;" class="vo1{{$row_per->id}}"><button class="btn btn-sm sbn btn-primary un_vo1 col-12 col-lg-6" abc="{{$row_per->id}}" type="button"><span>{{$row_per->vote}}</span></button></td>
                                    @endif
                                @endif
           
      @php
           //dd( $end_time,$startDate);
        $check=count($check);

          @endphp
                                   {{----------------------}}
                                   




{{--

                                    @if($check==0)
                                        <td style="text-align:center;" class="vo1{{$row_per->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1 col-12 col-lg-6" abc="{{$row_per->id}}" type="button"><span>{{$row_per->vote}}</span></button></a></td>
                                    @else
                                        <td style="text-align:center;" class="vo1{{$row_per->id}}"><button class="btn btn-sm sbn btn-primary un_vo1 col-12 col-lg-6" abc="{{$row_per->id}}" type="button"><span>{{$row_per->vote}}</span></button></td>
                                    @endif
            --}}






                                     {{--devote start
                                     @if($check==0)
                                        <td style="text-align:center;" class="devote{{$row_per->id}}"><button class="sbn btn btn-sm btn-outline-danger devote  col-12 col-lg-6" devote="{{$row_per->id}}" type="button"><span>{{$row_per->devote}}</span></button></td>
                                    @else
                                        <td style="text-align:center;" class="un_devote{{$row_per->id}}"><button class="btn btn-sm sbn btn-danger un_devote col-12 col-lg-6" un_devote="{{$row_per->id}}" type="button"><span>{{$row_per->devote}}</span></button></td>
                                    @endif  
                                    --}}  
                                @else
                                @php
                                        $check=App\Models\coin_vote::where('coin_id',$row_per->id)->where('user_id',$get_ses)->first();
                                       // dd(  $check);
                                     @endphp


                @php
                if(isset($check))
                {
                    $startDate= date('Y-m-d H:i:s', strtotime($check->created_at));
                    $start_date=Carbon\Carbon::parse($startDate)->format('Y-m-d');
                    $start_time=Carbon\Carbon::parse($startDate)->format('H:i:s');
                    $time=explode(':',$start_time);
                    $hours=$time[0];
                    $mint=$time[1];
                    $seconds=$time[2];
                
                    $end_time=Carbon\Carbon::parse($startDate)->addHour(24)->format('Y-m-d H:i:s');

                    $end_date=Carbon\Carbon::parse($startDate)->addHour(24)->format('Y-m-d');
                    // dd( $time,$start_date,$start_time,$end_date);
                    $first = Carbon\Carbon::create($startDate, $hours,$mint, $seconds);
                    $second = Carbon\Carbon::create($end_date, $hours, $mint, $seconds);
                    $to = Carbon\Carbon::now();
                    $time=Carbon\Carbon::create($to)->between($first, $second);
                }else{
                    $time=false;
                }
                @endphp
                @if($time)
                <td style="text-align:center;"><button class="btn btn-sm sbn btn-warning  col-12 col-lg-6" ><span>{{$row_per->vote}}</span></button></td>

                  @else 
                  @php
                                        $ses_check=App\Models\coin_vote::where('coin_id',$row_per->id)->where('user_id',$get_ses)->count();
                                     @endphp
                                 @if($ses_check==0)
                                        <td style="text-align: center;" class="vo1{{$row_per->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1 col-12 col-lg-6" abc="{{$row_per->id}}">{{$row_per->vote}}</button></a></td>
                                    @else
                                        <td style="text-align: center;" class="vo1{{$row_per->id}}"><button class="btn btn-sm sbn btn-primary un_vo1 col-12 col-lg-6" abc="{{$row_per->id}}">{{$row_per->vote}}</button></td>
                                     @endif 
             @endif
                                    

                                 {{--   // @if($ses_check==0)
                                    //     <td style="text-align: center;" class="vo1{{$row_per->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1 col-12 col-lg-6" abc="{{$row_per->id}}">{{$row_per->vote}}</button></a></td>
                                    // @else
                                    //     <td style="text-align: center;" class="vo1{{$row_per->id}}"><button class="btn btn-sm sbn btn-primary un_vo1 col-12 col-lg-6" abc="{{$row_per->id}}">{{$row_per->vote}}</button></td>
                                    // @endif   --}}   
                                     {{--devote start
                                     @if($check==0)
                                        <td style="text-align:center;" class="devote{{$row_per->id}}"><button class="sbn btn btn-sm btn-outline-danger devote  col-12 col-lg-6" devote="{{$row_per->id}}">{{$row_per->devote}}</button></td>
                                    @else
                                        <td style="text-align:center;" class="un_devote{{$row_per->id}}"><button class="btn btn-sm sbn btn-danger un_devote col-12 col-lg-6" un_devote="{{$row_per->id}}">{{$row_per->devote}}</button></td>
                                    @endif 
                                    --}}   
                                @endif
                               
                                <td>  <a href="{{url('coins', ['id'=>$row_per->id])}}">Info</a></td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                    
                    
           
            <div class="">
                <table class="w-100 mytable mt-5"  id="myTable1">
                    <tr class="table-heading">
                        <td>Tokenlist</td>
                    </tr>
                    <thead>
                        <tr>
                            <th class="">#</th>
                            <th>Name</th>
                            <th>Symbol</th>
                            <th>Price</th>
                            <th>Launch</th>
                     
                           <th>Vote</th>
                            {{-- <th>devote</th> --}}
                            <th>More</th>
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
                                <td ><a href="{{url('coins', ['id'=>$row_today->id])}}" class="name py-1"><img src="{{$row_today->logo_link}}"  >{{$row_today->name}}</a></td>
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
                                    <td ><a href="{{url('coins', ['id'=>$row_today->id])}}"> {{$diff_row_today}} days</a></td>

                                @endif
                                @php
                                    if(Auth::user())
                                    {
                                     $check1=DB::select("select * from coin_votes where ((coin_id=$row_today->id) and ((user_id=$us) or (user_id=$get_ses)))");
                                      
                                      $check1=count($check1);

                                    }
                                @endphp
                               
                                @if(Auth::user())
                                    @php


                                        $check=DB::select("select * from coin_votes where ((coin_id=$row_today->id) and ((user_id=$us) or (user_id=$get_ses)))");



                                        @endphp

                @php
                if(isset($check))
                {
                    $startDate= date('Y-m-d H:i:s', strtotime($check->created_at));
                    $start_date=Carbon\Carbon::parse($startDate)->format('Y-m-d');
                    $start_time=Carbon\Carbon::parse($startDate)->format('H:i:s');
                    $time=explode(':',$start_time);
                    $hours=$time[0];
                    $mint=$time[1];
                    $seconds=$time[2];
                
                    $end_time=Carbon\Carbon::parse($startDate)->addHour(24)->format('Y-m-d H:i:s');

                    $end_date=Carbon\Carbon::parse($startDate)->addHour(24)->format('Y-m-d');
                    // dd( $time,$start_date,$start_time,$end_date);
                    $first = Carbon\Carbon::create($startDate, $hours,$mint, $seconds);
                    $second = Carbon\Carbon::create($end_date, $hours, $mint, $seconds);
                    $to = Carbon\Carbon::now();
                    $time=Carbon\Carbon::create($to)->between($first, $second);
                }else{
                    $time=false;
                }
                @endphp
                 @if($time)
                 <td style="text-align:center;"><button class="btn btn-sm sbn btn-warning  col-12 col-lg-6" ><span>{{$row_per->vote}}</span></button></td>

                @else
                    @php
                        $check=count($check);
                    @endphp
                                    @if($check==0)
                                        <td style="text-align:center;" class="vo1{{$row_today->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1 col-12 col-lg-6" abc="{{$row_today->id}}" type="button"><span>{{$row_today->vote}}</span></button></a></td>
                                    @else
                                        <td style="text-align:center;" class="vo1{{$row_today->id}}"><button class="btn btn-sm sbn btn-primary un_vo1 col-12 col-lg-6" abc="{{$row_today->id}}" type="button"><span>{{$row_today->vote}}</span></button></td>
                                    @endif
                @endif
                                     


                                
                                     {{--devote start
                                     @if($check==0)
                                        <td style="text-align:center;" class="devote{{$row_today->id}}"><button class="sbn btn btn-sm btn-outline-danger devote  col-12 col-lg-6" devote="{{$row_today->id}}" type="button"><span>{{$row_today->devote}}</span></button></td>
                                    @else
                                        <td style="text-align:center;" class="un_devote{{$row_today->id}}"><button class="btn btn-sm sbn btn-danger un_devote col-12 col-lg-6" un_devote="{{$row_today->id}}" type="button"><span>{{$row_today->devote}}</span></button></td>
                                    @endif  
                                    --}}  
                                @else
                                    @php
                                $check=App\Models\coin_vote::where('coin_id',$row_per->id)->where('user_id',$get_ses)->first();
                                    @endphp


@php
                if(isset($check))
                {
                    $startDate= date('Y-m-d H:i:s', strtotime($check->created_at));
                    $start_date=Carbon\Carbon::parse($startDate)->format('Y-m-d');
                    $start_time=Carbon\Carbon::parse($startDate)->format('H:i:s');
                    $time=explode(':',$start_time);
                    $hours=$time[0];
                    $mint=$time[1];
                    $seconds=$time[2];
                
                    $end_time=Carbon\Carbon::parse($startDate)->addHour(24)->format('Y-m-d H:i:s');

                    $end_date=Carbon\Carbon::parse($startDate)->addHour(24)->format('Y-m-d');
                    // dd( $time,$start_date,$start_time,$end_date);
                    $first = Carbon\Carbon::create($startDate, $hours,$mint, $seconds);
                    $second = Carbon\Carbon::create($end_date, $hours, $mint, $seconds);
                    $to = Carbon\Carbon::now();
                    $time=Carbon\Carbon::create($to)->between($first, $second);
                }else{
                    $time=false;
                }
                @endphp
                 @if($time)
                 <td style="text-align:center;"><button class="btn btn-sm sbn btn-warning  col-12 col-lg-6" ><span>{{$row_per->vote}}</span></button></td>

                @else
                    @php
                      $ses_check=App\Models\coin_vote::where('coin_id',$row_today->id)->where('user_id',$get_ses)->count();

                    @endphp
                                 @if($ses_check==0)

                                <td style="text-align: center;" class="vo1{{$row_today->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1 col-12 col-lg-6" abc="{{$row_today->id}}">{{$row_today->vote}}</button></a></td>
                                @else
                                <td style="text-align: center;" class="vo1{{$row_today->id}}"><button class="btn btn-sm sbn btn-primary un_vo1 col-12 col-lg-6" abc="{{$row_today->id}}">{{$row_today->vote}}</button></td>

                                @endif
                @endif

                                   
                                     {{--devote start
                                     @if($ses_check==0)
                                        <td style="text-align:center;" class="devote{{$row_today->id}}"><button class="sbn btn btn-sm btn-outline-danger devote  col-12 col-lg-6" devote="{{$row_today->id}}">{{$row_today->devote}}</button></td>
                                    @else
                                        <td style="text-align:center;" class="un_devote{{$row_today->id}}"><button class="btn btn-sm sbn btn-danger un_devote col-12 col-lg-6"  un_devote="{{$row_today->id}}">{{$row_today->devote}}</button></td>
                                    @endif    
                                    --}}
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



@endsection