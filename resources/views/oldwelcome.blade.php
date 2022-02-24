@extends('../layouts/main')

@section('body_content')

    <style type="text/css">
        .nav-tabs .nav-item .active{
            background-color: #696c84 !important;
        }
        .sbn{
            width: 100%;
        }
        body{
            background-color:#2e2c40;
        }
        body a{
        color: black;
        }
        table{ 
            border-collapse: collapse;
           border-radius: 1em;
           overflow: hidden;

        }
        table thead{
            background-color: black;
            color: white;
        }
        table tbody{
            background-color: #E9F0F8;
            border:0px solid #E9F0F8;
            border-bottom-left-radius: 30px;


             

        }
        table th{
   
}
.cap{
     font-size:30px;
 }
 @media screen and (max-width: 600px) {
 .btn-primary{
    padding: .15rem 0.3rem;
    font-size: 0.775rem;

 }
 table{
    font-size:0.50rem;
 }
 .table tbody tr td a img{
    width: 10px;
    height: 10px;
 }
 .tdd a{
     margin-top:14px;
 }
 .table td, .table th {
    padding: .32rem;
  }
  .tab-content {
      margin-top:-25%;
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
    <!--stylesheets / link tags loaded here-->

    <link rel="stylesheet" href="{{asset('style.css')}}">
    <!--
    =============================================
        Cryonik Main Banner
    ==============================================
    -->
    <div class="se-pre-con"></div>
    @php $images=App\Models\slider_img::take('1')->orderBy('id', 'DESC')->get();
    $images2=App\Models\slider_img::orderBy('id', 'DESC')->get();

    @endphp
    @if(Session::has('success'))
        <div class="alert alert-success" style="width:100%;">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif

    <div class="row mx-auto my-auto" style="margin-top:3%!important;">
        <div id="myCarousel" class="carousel slide container" data-ride="carousel">
            <div class="carousel-inner w-100" role="listbox">

                @foreach($images as $row_img)
                    <div class="carousel-item active">
                        <div class="col-lg-4 col-md-6">
                            <a href="{{$row_img->url}}">
                                <img class="img-fluid rounded" src="{{url('upload/images/'.$row_img->file)}}"></a>
                        </div>
                    </div>
                @endforeach

                @for($i=1; $i < count($images2); $i++)
                    <div class="carousel-item">
                        <div class="col-lg-4 col-md-6">
                            <a href="{{$images2[$i]->url}}">
                                <img class="img-fluid rounded" src="{{url('upload/images/'.$images2[$i]->file)}}"></a>
                        </div>
                    </div>
                @endfor








            </div>
            <!-- <a class="carousel-control-prev w-auto" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next  w-auto" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a> -->
        </div>
    </div>


    <div class="plan-tabs-wrap mt-5">
        <div class="container">
            <ul class="nav nav-tabs plan-nav" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="basic1" data-toggle="tab" href="#basic1" role="tab" aria-controls="basic" aria-selected="true" style="color: #fff;
    padding: 1.5vh 2rem;
    cursor: pointer;
    background-color: #2e2c40;
    border-radius: 1rem;
    margin-right: 1.2rem;
    border: 1px solid #9488f0;
    white-space: nowrap;"> Promoted coins</a>
            </li>


            </ul>
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





            $all_coin=App\Models\add_coin::whereNotNull('approve')->paginate(30);
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
            $today_coin_all=App\Models\add_coin::whereNotNull('approve')->orderBy('vote', 'DESC')->paginate(100);
            $weekly_coin=App\Models\add_coin::whereDate('created_at','>=',$this_week_sd)->whereDate('created_at','<=',$this_week_ed)->whereNotNull('approve')->orderBy('vote', 'DESC')->paginate(10);
            $weekly_coin2=App\Models\add_coin::whereDate('created_at','>=',$this_week_sd)->whereDate('created_at','<=',$this_week_ed)->whereNotNull('approve')->orderBy('vote', 'DESC')->take('120')->get();

            $monthly_coin=App\Models\add_coin::whereMonth('created_at',$dtm)->orderBy('vote', 'DESC')->whereNotNull('approve')->paginate(10);
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
        <div class="tab-content " id="myTab1Content" style="padding-left:8%;padding-right:8%;">
            <div class="tab-pane fade show active" id="basic1" role="tabpanel" aria-labelledby="basic-tab">
                <div class="table-responsive">
                    <table class="table table-hover" id="promoted_1">
                        <caption class="cap" style="text-align: center;caption-side:top;color:white;">Promoted coins</caption>

                        <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Market cap</th>
                            <th>Time since launch</th>
                            <th>Votes</th>
                        </tr>
                        </thead>
                        <tbody>
                        <style type="text/css">
                            td a{
                                display: block;
                                cursor: pointer;
                            }
                        </style>
                        @php $a=1;
                        $xyz=0;
                        @endphp
                        @foreach($per_coin as $row_per)
                            @php $xyz++; @endphp
                            <tr>


                                <td><a href="{{url('coins', ['id'=>$row_per->id])}}"><img src="{{$row_per->logo_link}}" style="height: 40px; width: 40px;"></td></a>
                                <td class="tdd"><a href="{{url('coins', ['id'=>$row_per->id])}}">{{$row_per->name}}</a></td></td>
                                <td class="tdd"><a href="{{url('coins', ['id'=>$row_per->id])}}">${{$row_per->mark_cap}}</a></td>
                                @php

                                    $later_row_per = new DateTime($row_per->launch_date);
                                    $diff_row_per = $today->diff($later_row_per)->format("%a");  @endphp
                                @if($row_per->launch_date<$dt)
                                    <td class="tdd"><a href="{{url('coins', ['id'=>$row_per->id])}}">{{$diff_row_per}}days</a></td>
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
                                        <td style="text-align:center;" class="vo1{{$row_per->id}}"><button class="btn btn-sm sbn btn-primary un_vo1" abc="{{$row_per->id}}" type="button">🚀<span>{{$row_per->vote}}</span></button></td>
                                    @endif
                                @else
                                    @php


                                        $ses_check=App\Models\coin_vote::where('coin_id',$row_per->id)->where('user_id',$get_ses)->count();


                                    @endphp
                                    @if($ses_check==0)

                                        <td style="text-align: center;" class="vo1{{$row_per->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_per->id}}" type="button"><span>🚀{{$row_per->vote}}</span></button></a></td>
                                    @else
                                        <td style="text-align: center;" class="vo1{{$row_per->id}}"><button class="btn btn-sm sbn btn-primary un_vo1" abc="{{$row_per->id}}" type="button">🚀<span>{{$row_per->vote}}</span></button></td>

                                    @endif



                                @endif
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    
                    <table class="table table-bordered table-hover" style="display:none;" id="promoted_2">
                        <caption class="cap" style="text-align: center;caption-side:top;color:white;">Promoted coins</caption>

                        <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Market cap</th>
                            <th>Time since launch</th>
                            <th>Votes</th>
                        </tr>
                        </thead>
                        <tbody>
                        <style type="text/css">
                            td a{
                                display: block;
                                cursor: pointer;
                            }
                        </style>
                        @php $a=1;  @endphp
                        @foreach($per_coin2 as $row_per)
                            <tr>


                                <td><a href="{{url('coins', ['id'=>$row_per->id])}}"><img src="{{$row_per->logo_link}}" style="height: 40px; width: 40px;"></td></a>
                                <td class="tdd"><a href="{{url('coins', ['id'=>$row_per->id])}}">{{$row_per->name}}</a></td></td>
                                <td class="tdd"><a href="{{url('coins', ['id'=>$row_per->id])}}">${{$row_per->mark_cap}}</a></td>
                                @php

                                    $later_row_per = new DateTime($row_per->launch_date);
                                    $diff_row_per = $today->diff($later_row_per)->format("%a");  @endphp
                                @if($row_per->launch_date<$dt)
                                    <td class="tdd"><a href="{{url('coins', ['id'=>$row_per->id])}}">{{$diff_row_per}}days</a></td>
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
                                        <td style="text-align:center;" class="vo1{{$row_per->id}}"><button class="btn btn-sm sbn btn-primary un_vo1" abc="{{$row_per->id}}" type="button">🚀<span>{{$row_per->vote}}</span></button></td>
                                    @endif
                                @else
                                    @php


                                        $ses_check=App\Models\coin_vote::where('coin_id',$row_per->id)->where('user_id',$get_ses)->count();


                                    @endphp
                                    @if($ses_check==0)

                                        <td style="text-align: center;" class="vo1{{$row_per->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_per->id}}" type="button"><span>{{$row_per->vote}}</span></button></a></td>
                                    @else
                                        <td style="text-align: center;" class="vo1{{$row_per->id}}"><button class="btn btn-sm sbn btn-primary un_vo1" abc="{{$row_per->id}}" type="button">🚀<span>{{$row_per->vote}}</span></button></td>

                                    @endif



                                @endif
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    
                    
                       @if($xyz==2)
                    <div style="width: 100%;text-align: center;"><button class="sbn btn btn-sm btn-outline-primary set5" style="width:40%;margin-right: 0;margin-left: 0;">See All</button>
                    </div>
                @endif
                    
                </div>

            </div> <!-- /.tab-pane -->
            <!-- /.tab-pane -->

        </div> <!-- /.tab-content -->
    </div>
    <div class="container" >
        <img src="{{asset('p3.jpg')}}" alt="" style="margin-top:10%;width: 100%;">

    </div>
    <div class="plan-tabs-wrap">
        <div class="container" style="margin-top:6%;">
            <ul class="nav nav-tabs plan-nav" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="basic-tab" data-toggle="tab" href="#basic" role="tab" aria-controls="basic" aria-selected="true" style="color: #fff;
    padding: 1.5vh 2rem;
    cursor: pointer;
    background-color: #2e2c40;
    border-radius: 1rem;
    margin-right: 1.2rem;
    border: 1px solid #9488f0;
    white-space: nowrap;">🔥 Today's best</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="blue-tab" data-toggle="tab" href="#blue" role="tab" aria-controls="blue" aria-selected="false"
                     style="color: #fff;
    padding: 1.5vh 2rem;
    cursor: pointer;
    background-color: #2e2c40;
    border-radius: 1rem;
    margin-right: 1.2rem;
    border: 1px solid #9488f0;
    white-space: nowrap;">🥇 All Time Best</a>
                </li>
                @if(Auth::user())
                    <li class="nav-item">
                        <a class="nav-link " id="your-tab" data-toggle="tab" href="#your" role="tab" aria-controls="blue" aria-selected="false" style="color: #fff;
    padding: 1.5vh 2rem;
    cursor: pointer;
    background-color: #2e2c40;
    border-radius: 1rem;
    margin-right: 1.2rem;
    border: 1px solid #9488f0;
    white-space: nowrap;">Your Hunts</a>
                    </li>
                @endif

            </ul>
        </div>

        <div class="tab-content" id="myTabContent" style="padding-left:8%;padding-right:8%;">
            <div class="tab-pane fade show active " id="basic" role="tabpanel" aria-labelledby="basic-tab">
                <button type="button" class="btn btn-primary" style="height: 30px; padding: 5px; font-size: 0.8rem; float: left; margin-bottom: 2%;" onclick="myFunction_s1()"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="1em" height="1em" fill="currentColor"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path></svg> Search</button>
                <div id="mydiv1" style="display: none;">
                    <input id="myInput1" type="text" placeholder="Search.." style="border: 2px solid #e9ecef;width:50%;border-top-right-radius:10px;border-bottom-right-radius:10px;"></div>
                <div class="table-responsive">


                    <table class="table table-bordered table-hover myTable1"  id="myTable1">
                        <caption class="cap" style="text-align: center;caption-side:top;color:white;">Today's best</caption>


                        <thead style=>
                        <tr>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Market cap</th>
                            <th>Time since launch</th>
                            <th>Votes</th>
                        </tr>
                        </thead>
                        <tbody class="myTable1">
                        @php $al_kk=0; @endphp
                        @foreach($today_coin as $row_today)
                        @php $al_kk++; @endphp
                            <tr>
                                <td><a href="{{url('coins', ['id'=>$row_today->id])}}"><img src="{{$row_today->logo_link}}" style="height: 40px; width: 40px;"></a></td>
                                <td class="tdd"><a href="{{url('coins', ['id'=>$row_today->id])}}">{{$row_today->name}}</a></td>
                                <td class="tdd"><a href="{{url('coins', ['id'=>$row_today->id])}}">${{$row_today->mark_cap}}</a></td>
                                @php

                                    $later_row_today = new DateTime($row_today->launch_date);
                                    $diff_row_today= $today->diff($later_row_today)->format("%a");  @endphp


                                @if($row_today->launch_date<$dt)
                                    <td class="tdd"><a href="{{url('coins', ['id'=>$row_today->id])}}">{{$diff_row_today}}days</a></td>
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
                                        <td class="vo1{{$row_today->id}}"><button class="sbn btn btn-sm btn-primary un_vo1" abc="{{$row_today->id}}" type="button">🚀{{$row_today->vote}}</button></td>
                                    @endif
                                @else
                                    @php
                                        $see_check=App\Models\coin_vote::where('coin_id',$row_today->id)->where('user_id',$get_ses)->count();
                                    @endphp
                                    @if($see_check==0)
                                        <td class="vo1{{$row_today->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_today->id}}" type="button">🚀{{$row_today->vote}}</button></td>
                                    @else
                                        <td class="vo1{{$row_today->id}}"><button class="sbn btn btn-sm btn-primary un_vo1" abc="{{$row_today->id}}" type="button">{{$row_today->vote}}</button></td>
                                    @endif



                                @endif

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <table class="table table-bordered table-hover myTable1"  id="myTable11" style="display:none;">
                        <caption class="cap" style="text-align: center;caption-side:top;color:white;">Today's best</caption>


                        <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Market cap</th>
                            <th>Time launch</th>
                            <th>Votes</th>
                        </tr>
                        </thead>
                        <tbody class="myTable1">
                        @foreach($today_coin_all as $row_today)
                            <tr>
                                <td><a href="{{url('coins', ['id'=>$row_today->id])}}"><img src="{{$row_today->logo_link}}" style="height: 40px; width: 40px;"></a></td>
                                <td class="tdd"><a href="{{url('coins', ['id'=>$row_today->id])}}">{{$row_today->name}}</a></td>
                                <td class="tdd"><a href="{{url('coins', ['id'=>$row_today->id])}}">${{$row_today->mark_cap}}</a></td>
                                @php

                                    $later_row_today = new DateTime($row_today->launch_date);
                                    $diff_row_today= $today->diff($later_row_today)->format("%a");  @endphp


                                @if($row_today->launch_date<$dt)
                                    <td class="tdd"><a href="{{url('coins', ['id'=>$row_today->id])}}">{{$diff_row_today}}days</a></td>
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
                                        <td class="vo1{{$row_today->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_today->id}}" type="button">🚀{{$row_today->vote}}</button></td>
                                    @else
                                        <td class="vo1{{$row_today->id}}"><button class="sbn btn btn-sm btn-primary un_vo1" abc="{{$row_today->id}}" type="button">🚀{{$row_today->vote}}</button></td>
                                    @endif
                                @else
                                    @php
                                        $see_check=App\Models\coin_vote::where('coin_id',$row_today->id)->where('user_id',$get_ses)->count();
                                    @endphp
                                    @if($see_check==0)
                                        <td class="vo1{{$row_today->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_today->id}}" type="button">🚀{{$row_today->vote}}</button></td>
                                    @else
                                        <td class="vo1{{$row_today->id}}"><button class="sbn btn btn-sm btn-primary un_vo1" abc="{{$row_today->id}}" type="button">🚀{{$row_today->vote}}</button></td>
                                    @endif



                                @endif

                            </tr>
                        @endforeach
                        </tbody>
                    </table><!-- /.custom-container-two -->
                @if($al_kk==10)
                    <div style="width: 100%;text-align: center;"><button class="sbn btn btn-sm btn-outline-primary set15" style="width:40%;margin-right: 0;margin-left: 0;">See All</button>
                    </div>
                @endif
                </div>
            </div> <!-- /.tab-pane -->
            <div class="tab-pane fade"  id="blue" role="tabpanel" aria-labelledby="blue-tab">
                <button type="button" class="btn btn-primary" style="height: 30px; padding: 5px; font-size: 0.8rem; float: left; margin-bottom: 2%;" onclick="myFunction_s2()"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="1em" height="1em" fill="currentColor"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path></svg> Search</button>
                <div id="mydiv2" style="display: none;">
                    <input id="myInput2" type="text" placeholder="Search.." style="border: 2px solid #e9ecef;width:50%;border-top-right-radius:10px;border-bottom-right-radius:10px;"></div>
                <div class="table-responsive ">
                    

                    <table class="table table-bordered table-hover myTable2"  id="myTable2">
                        <caption class="cap" style="text-align: center;caption-side:top;color:white;">All Time best</caption>

                        <thead>
                        <tr class="header">
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Market cap</th>
                            <th>Time launch</th>
                            <th>Votes</th>
                        </tr>
                        </thead>

                        <tbody class="sell_all t1" >

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


                                <td><a href="{{url('coins', ['id'=>$row->id])}}"><img src="{{$row->logo_link}}" style="height: 40px; width: 40px;"></td></a>
                                <td class="tdd"  style="max-width: 24%;min-width: 27%;"><a href="{{url('coins', ['id'=>$row->id])}}">{{$row->name}}</a></td></td>
                                <td class="tdd"><a href="{{url('coins', ['id'=>$row->id])}}">${{$row->mark_cap}}</a></td>
                                @php

                                    $later = new DateTime($row->launch_date);
                                    $diff_row = $today->diff($later)->format("%a");
                                @endphp
                                @if($row->launch_date<$dt)
                                    <td class="tdd"><a href="{{url('coins', ['id'=>$row->id])}}">{{$diff_row}}days</a></td>
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
                                @else
                                    @php


                                        $ses_check=App\Models\coin_vote::where('coin_id',$row->id)->where('user_id',$get_ses)->count();


                                    @endphp
                                    @if($ses_check==0)
                                        <td class="vo1{{$row->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row->id}}" type="button">🚀{{$row->vote}}</button></td>
                                    @else
                                        <td class="vo1{{$row->id}}"><button class="btn btn-sm sbn btn-primary un_vo1" abc="{{$row->id}}" type="button">🚀{{$row->vote}}</button></a></td>
                                    @endif




                                @endif
                            </tr>
                        @endforeach
                        


                        </tbody>
                        @if($al_k==30)
                        <caption style="caption-side:bottom;text-align: center"><button class="sbn btn btn-sm btn-outline-primary set1 cap1" last_id="{{$all_coin[29]->id}}" style="width:40%;margin-right: 0;margin-left: 0;">Show More</button>
                        </caption>
                        @endif
                    </table>
                    
                    
                </div>
                
                
            </div> <!-- /.tab-pane -->

            @if(Auth::user())
                <div class="tab-pane fade " id="your" role="tabpanel" aria-labelledby="blue-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <caption class="cap" style="text-align: center;caption-side:top;color:white;">Your Hunts
                                <thead>
                                <tr>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Market cap</th>
                                    <th>Time since launch</th>
                                    <th>Status</th>
                                    <th>Votes</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($your_coin as $row_your)
                                    <tr>
                                        <td><a href="{{url('coins', ['id'=>$row_your->id])}}"><img src="{{$row_your->logo_link}}" style="height: 40px; width: 40px;"></a></td>
                                        <td class="tdd"><a href="{{url('coins', ['id'=>$row_your->id])}}">{{$row_your->name}}</a></td>
                                        <td class="tdd"><a href="{{url('coins', ['id'=>$row_your->id])}}">${{$row_your->mark_cap}}</a></td>
                                        @php

                                            $later_row_your = new DateTime($row_your->launch_date);
                                            $diff_row_your= $today->diff($later_row_your)->format("%a");  @endphp


                                        @if($row_your->launch_date<$dt)
                                            <td class="tdd"><a href="{{url('coins', ['id'=>$row_your->id])}}">{{$diff_row_your}}days</a></td>
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
                                            <td>Waiting For Approval</td>
                                        @else
                                            <td>Active</td>
                                        @endif
                                        @if($checkyy==0)
                                            <td class="vo1{{$row_your->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_your->id}}" type="button">{{$row_your->vote}}</button></td>
                                        @else
                                            <td class="vo1{{$row_your->id}}"><button class="sbn btn btn-sm btn-primary un_vo1" abc="{{$row_your->id}}" type="button">🚀{{$row_your->vote}}</button></td>
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

        </div> <!-- /.tab-content -->
    </div>
    <div class="Cryonik-main-banner">
        <div class="img-wrapper float-right fadeInRight wow" data-wow-duration="1.2s" data-wow-delay="1.6s">
            <img src="{{asset('p2.png')}}" style="margin-top:10%;margin-left:-17%!important;">
        </div>
        <div class="container">
            <div class="main-wrapper clearfix">
                <div class="text-wrapper float-left">
                    <h5 class="main-title fadeInDown wow" data-wow-duration="1.2s" data-wow-delay="0.5s" style="color: white;">List your Coin for Free on our page or promote it for massive reach</h5>
                    <p class="sub-text fadeInUp wow" data-wow-duration="1.2s" data-wow-delay="0.5s"></p>

                    <ul class="button-group fadeInUp wow" data-wow-duration="1.2s" data-wow-delay="1s">
                        <li class="start-button"><a href="{{url('contact_us')}}" class="theme-button grdn-bg">Promote Coin</a></li>
                        <li class="start-button sp1"><a href="{{url('user/add_coin')}}" class="theme-button grdn-bg" style="">List Coin</a></li>

                    </ul>

                </div> <!-- /.text-wrapper -->
            </div> <!-- /.main-wrapper -->
        </div> <!-- /.container -->
    </div> <!-- /.Cryonik-main-banner -->

    <div class="plan-tabs-wrap">
        <div class="container" style="margin-top:6%;">
            <ul class="nav nav-tabs plan-nav" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="basic-tab" data-toggle="tab" href="#weekly" role="tab" aria-controls="basic" aria-selected="true" style="color: #fff;
                        padding: 1.5vh 2rem;
                        cursor: pointer;
                        background-color: #2e2c40;
                        border-radius: 1rem;
                        margin-right: 1.2rem;
                        border: 1px solid #9488f0;
                        white-space: nowrap;"> Weekly</a>
                                    </li>
                <li class="nav-item">
                    <a class="nav-link " id="blue-tab" data-toggle="tab" href="#monthly" role="tab" aria-controls="blue" aria-selected="false" style="color: #fff;
                padding: 1.5vh 2rem;
                cursor: pointer;
                background-color: #2e2c40;
                border-radius: 1rem;
                margin-right: 1.2rem;
                border: 1px solid #9488f0;
                white-space: nowrap;"> Monthly</a>
                </li>

            </ul>
        </div>

        <div class="tab-content" id="myTabContent" style="padding-left:8%;padding-right:8%;">

            <div class="tab-pane fade show active" id="weekly" role="tabpanel" aria-labelledby="basic-tab">
                <button type="button" class="btn btn-primary" style="height: 30px; padding: 5px; font-size: 0.8rem; float: left; margin-bottom: 2%;" onclick="myFunction_s3()"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="1em" height="1em" fill="currentColor"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path></svg> Search</button>
                <div id="mydiv3" style="display: none;">
                    <input id="myInput3" type="text" placeholder="Search.." style="border: 2px solid #e9ecef;width:50%;border-top-right-radius:10px;border-bottom-right-radius:10px;"></div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover myTable3"  id="myTable3">
                        <caption class="cap" style="text-align: center;caption-side:top;color:white;">Weekly</caption>
                        <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Market cap</th>
                            <th>Time since launch</th>
                            <th>Votes</th>
                        </tr>
                        </thead>
                        <tbody class="myTable3">

                        @foreach($weekly_coin as $row_wk)
                            <tr>


                                <td><a href="{{url('coins', ['id'=>$row_wk->id])}}"><img src="{{$row_wk->logo_link}}" style="height: 40px; width: 40px;"></a></td>
                                <td class="tdd"><a href="{{url('coins', ['id'=>$row_wk->id])}}">{{$row_wk->name}}</a></td>
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

                                        <td class="vo1{{$row_wk->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_wk->id}}" type="button">🚀{{$row_wk->vote}}</button></td>
                                    @else
                                        <td class="vo1{{$row_wk->id}}"><button class="sbn btn btn-sm btn-primary un_vo1" abc="{{$row_wk->id}}" type="button">{{$row_wk->vote}}</button></td>
                                    @endif
                                @else
                                    @php
                                        $see_check=App\Models\coin_vote::where('coin_id',$row_wk->id)->where('user_id',$get_ses)->count();
                                    @endphp
                                    @if($see_check==0)

                                        <td class="vo1{{$row_wk->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_wk->id}}" type="button">🚀{{$row_wk->vote}}</button></td>
                                    @else
                                        <td class="vo1{{$row_wk->id}}"><button class="sbn btn btn-sm btn-primary un_vo1" abc="{{$row_wk->id}}" type="button">🚀{{$row_wk->vote}}</button></td>
                                    @endif


                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <table class="table table-bordered table-hover myTable3"  id="myTable31" style="display:none;">
                        <caption class="cap" style="text-align: center;caption-side:top;color:white;">Weekly</caption>
                        <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Market cap</th>
                            <th>Time since launch</th>
                            <th>Votes</th>
                        </tr>
                        </thead>
                        <tbody class="myTable3">

                        @foreach($weekly_coin2 as $row_wk)
                            <tr>


                                <td><a href="{{url('coins', ['id'=>$row_wk->id])}}"><img src="{{$row_wk->logo_link}}" style="height: 40px; width: 40px;"></a></td>
                                <td class="tdd"><a href="{{url('coins', ['id'=>$row_wk->id])}}">{{$row_wk->name}}</a></td>
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

                                        <td class="vo1{{$row_wk->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_wk->id}}" type="button">🚀{{$row_wk->vote}}</button></td>
                                    @else
                                        <td class="vo1{{$row_wk->id}}"><button class="sbn btn btn-sm btn-primary un_vo1" abc="{{$row_wk->id}}" type="button">🚀{{$row_wk->vote}}</button></td>
                                    @endif
                                @else
                                    @php
                                        $see_check=App\Models\coin_vote::where('coin_id',$row_wk->id)->where('user_id',$get_ses)->count();
                                    @endphp
                                    @if($see_check==0)

                                        <td class="vo1{{$row_wk->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_wk->id}}" type="button">🚀{{$row_wk->vote}}</button></td>
                                    @else
                                        <td class="vo1{{$row_wk->id}}"><button class="sbn btn btn-sm btn-primary un_vo1" abc="{{$row_wk->id}}" type="button">{{$row_wk->vote}}</button></td>
                                    @endif


                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <div style="width: 100%;text-align: center;"><button class="sbn btn btn-sm btn-outline-primary set3" style="width:40%;">See All</button></div>
            </div> <!-- /.tab-pane -->
            <div class="tab-pane fade " id="monthly" role="tabpanel" aria-labelledby="blue-tab">
                <button type="button" class="btn btn-primary" style="height: 30px; padding: 5px; font-size: 0.8rem; float: left; margin-bottom: 2%;" onclick="myFunction_s4()"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="1em" height="1em" fill="currentColor"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path></svg> Search</button>
                <div id="mydiv4" style="display: none;">
                    <input id="myInput4" type="text" placeholder="Search.." style="border: 2px solid #e9ecef;width:50%;border-top-right-radius:10px;border-bottom-right-radius:10px;"></div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover myTable4"  id="myTable4">
                        <caption class="cap" style="text-align: center;caption-side:top;color:white;">Monthly</caption>
                        <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Market cap</th>
                            <th>Time since launch</th>
                            <th>Votes</th>
                        </tr>
                        </thead>
                        <tbody class="myTable4">
                        @foreach($monthly_coin as $row_mon2)
                            <tr>
                                <td><a href="{{url('coins', ['id'=>$row_mon2->id])}}"><img src="{{$row_mon2->logo_link}}" style="height: 40px; width: 40px;"></a></td>
                                <td class="tdd"><a href="{{url('coins', ['id'=>$row_mon2->id])}}">{{$row_mon2->name}}</a></td>
                                <td class="tdd"><a href="{{url('coins', ['id'=>$row_mon2->id])}}">${{$row_mon2->mark_cap}}</a></td>
                                @php

                                    $later_row_mon2 = new DateTime($row_mon2->launch_date);
                                    $diff_row_mon2= $today->diff($later_row_mon2)->format("%a");  @endphp
                                @if($row_mon2->launch_date<$dt)
                                    <td class="tdd"><a href="{{url('coins', ['id'=>$row_mon2->id])}}">{{$diff_row_mon2}}days</a></td>
                                @elseif($row_mon2->launch_date==$dt)
                                    <td class="tdd"> Launch Today</td>
                                @else
                                    <td class="tdd"><a href="{{url('coins', ['id'=>$row_mon2->id])}}">Launch in {{$diff_row_mon2}} days</a></td>

                                @endif
                                @php
                                    if(Auth::user())
                                    {
                                       $check4=DB::select("select * from coin_votes where ((coin_id=$row_mon2->id) and ((user_id=$us) or (user_id=$get_ses)))");
                                       $check4=count($check4);
                                    }

                                @endphp
                                @if(Auth::user())
                                    @if($check4==0)
                                        <td class="vo1{{$row_mon2->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_mon2->id}}" type="button">{{$row_mon2->vote}}</button></td>
                                    @else

                                        <td class="vo1{{$row_mon2->id}}"><button class="sbn btn btn-sm btn-primary un_vo1" abc="{{$row_mon2->id}}" type="button">🚀{{$row_mon2->vote}}</button></td>
                                    @endif
                                @else
                                    @php
                                        $ses_check=App\Models\coin_vote::where('coin_id',$row_mon2->id)->where('user_id',$get_ses)->count();
                                    @endphp
                                    @if($ses_check==0)
                                        <td class="vo1{{$row_mon2->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_mon2->id}}" type="button">🚀{{$row_mon2->vote}}</button></td>
                                    @else

                                        <td class="vo1{{$row_mon2->id}}"><button class="sbn btn btn-sm btn-primary un_vo1" abc="{{$row_mon2->id}}" type="button">🚀{{$row_mon2->vote}}</button></td>
                                    @endif
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table> <!-- /.custom-container-two -->
                    <table class="table table-bordered table-hover myTable4"  id="myTable41" style="display:none;">
                        <caption class="cap" style="text-align: center;caption-side:top;color:white;">Monthly</caption>
                        <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Market cap</th>
                            <th>Time since launch</th>
                            <th>Votes</th>
                        </tr>
                        </thead>
                        <tbody classs="myTable4">
                        @foreach($monthly_coin2 as $row_mon2)
                            <tr>
                                <td><a href="{{url('coins', ['id'=>$row_mon2->id])}}"><img src="{{$row_mon2->logo_link}}" style="height: 40px; width: 40px;"></a></td>
                                <td class="tdd"><a href="{{url('coins', ['id'=>$row_mon2->id])}}">{{$row_mon2->name}}</a></td>
                                <td class="tdd"><a href="{{url('coins', ['id'=>$row_mon2->id])}}">${{$row_mon2->mark_cap}}</a></td>
                                @php

                                    $later_row_mon2 = new DateTime($row_mon2->launch_date);
                                    $diff_row_mon2= $today->diff($later_row_mon2)->format("%a");  @endphp
                                @if($row_mon2->launch_date<$dt)
                                    <td class="tdd"><a href="{{url('coins', ['id'=>$row_mon2->id])}}">{{$diff_row_mon2}}days</a></td>
                                @elseif($row_mon2->launch_date==$dt)
                                    <td class="tdd"> Launch Today</td>
                                @else
                                    <td class="tdd"><a href="{{url('coins', ['id'=>$row_mon2->id])}}">Launch in {{$diff_row_mon2}} days</a></td>

                                @endif
                                @php
                                    if(Auth::user())
                                    {
                                       $check4=DB::select("select * from coin_votes where ((coin_id=$row_mon2->id) and ((user_id=$us) or (user_id=$get_ses)))");
                                       $check4=count($check4);
                                    }

                                @endphp
                                @if(Auth::user())
                                    @if($check4==0)
                                        <td class="vo1{{$row_mon2->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_mon2->id}}" type="button">🚀{{$row_mon2->vote}}</button></td>
                                    @else

                                        <td class="vo1{{$row_mon2->id}}"><button class="sbn btn btn-sm btn-primary un_vo1" abc="{{$row_mon2->id}}" type="button">🚀{{$row_mon2->vote}}</button></td>
                                    @endif
                                @else
                                    @php
                                        $ses_check=App\Models\coin_vote::where('coin_id',$row_mon2->id)->where('user_id',$get_ses)->count();
                                    @endphp
                                    @if($ses_check==0)
                                        <td class="vo1{{$row_mon2->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_mon2->id}}" type="button">🚀{{$row_mon2->vote}}</button></td>
                                    @else

                                        <td class="vo1{{$row_mon2->id}}"><button class="sbn btn btn-sm btn-primary un_vo1" abc="{{$row_mon2->id}}" type="button">🚀{{$row_mon2->vote}}</button></td>
                                    @endif
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="width: 100%;text-align: center;"><button class="sbn btn btn-sm btn-outline-primary set2" style="width:40%;">See All</button></div>
            </div> <!-- /.tab-pane -->

        </div> <!-- /.tab-content -->
    </div>





    <div class="container mt-5 mb-3">
        <div class="row mb-5" style="background-color:#eff2f7;">
            <div class="col-md-6">
                <img src="{{asset('crypto/images/icon/news.svg')}}" width="100%">

            </div>
            <div class="col-md-6" style="margin-bottom:6%;">
                <center>
                    <h3 class="mt-5">Subscribe to our newsletter</h3>
                    <p>Get the best high potential coins right into your inbox.</p>
                </center>
                <form class="login-form" autocomplete="off" method="POST" class="login-form" action="{{ url('subscribe') }}">
                    @csrf
                    <center>
                        <input type="email" name="email" placeholder="Email" style="width:80%;margin-top:3%;background-color:white;border:1px solid white;" value="@if(Auth::user()){{Auth::user()->email}} @endif">

                        <button class="btn btn-info" style="width:80%;margin-top:5%;background-color:#66a6ff;border-color:#66a6ff; ">Submit</button>

                    </center>
                </form>

            </div>
        </div>
    </div>








    <!--
    =====================================================
        Footer
    =====================================================
    -->

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
                
                
                if(set>=30)
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
                        op+='<button class="btn btn-sm sbn btn-primary un_vo1" type="button" abc='+data.id+'>🚀'+data.dat+'</button>';
                        $('.vo1'+ids).append(op);



                    },
                });
                set=0;
            }
            else{
                alert('You Have To wait for 30s for next vote');
            }
            });
       
            $(document).on("click" ,'.un_vo1', function(){
                

            if(set>=30)
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
                        op+='<button class="btn btn-sm sbn btn-outline-primary vo1" type="button" abc='+data.id+'>🚀'+data.dat+'</button>';
                        $('.vo1'+ids).append(op);



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
                

                $.ajax({
                    type: 'get',
                    url:"{{ url('/user/get_see_all') }}",

                    data: {'id':ids},

                    success: function (data) {
                        $('.cap1').remove();
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
                $("#myTable3").hide();
                $(".set3").hide();
                document.getElementById("myTable31").style.display = "inline-table";


            });
            
               $(document).on("click" ,'.set5', function(){
                $("#promoted_1").hide();
                $(".set5").hide();
                document.getElementById("promoted_2").style.display = "inline-table";


            });
              $(document).on("click" ,'.set15', function(){
                $("#myTable1").hide();
                $(".set15").hide();
                document.getElementById("myTable11").style.display = "inline-table";


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
            $("#myInput2").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".myTable2 tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            $("#myInput3").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".myTable3 tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            $("#myInput4").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".myTable4 tr").filter(function() {
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