@extends('../layouts/main')
@section('title')
Topgainer
@endsection
@section('body_content')
<style type="text/css">
        .nav-tabs .nav-item .active{
            background-color: #696c84 !important;
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

 @media screen and (max-width: 600px) {
 .som{
    display: none;
 }
 .btn-primary{
    padding: .15rem 0.3rem;
    font-size: 0.775rem;

 }
 
 .table tbody tr td a img{
    width: 10px;
    height: 10px;
 }


}
</style>
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
           $today_coin=App\Models\add_coin::whereNotNull('approve')->orderBy('vote', 'DESC')->paginate(10);

            $per_coin=App\Models\add_coin::whereNotNull('approve')->whereNotNull('permote')->orderBy('vote', 'DESC')->paginate(10);
            $per_coin2=App\Models\add_coin::whereNotNull('approve')->whereNotNull('permote')->orderBy('vote', 'DESC')->get();
            if(Auth::user())
            {
            $us=Auth::user()->id;
            }
            else{
            $us=0;
            }
            

           if(Session::has('id'))
           {
           $get_ses=Session::get('id');

           }
           else{
            $get_ses=0;

           }

        @endphp
        <div class="container">
            <div class="row mb-5 mt-5 justify-content-center">
                @if(Session::has('success'))
                <div class="alert alert-success" style="width:100%;">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
                @endif

            </div>
        </div>
        
            <div class="container-fluid">
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
          </div>
          <script type="text/javascript">
            $(document).on("click" ,'.set5', function(){
                $("#promoted_1").hide();
                $(".set5").hide();
                document.getElementById("promoted_2").style.display = "inline-table";


            });
          </script>

@endsection