@extends('../layouts/main')
@section('title')
New
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
                    <table  class="w-100 mytable mt-5" id="promoted_1">
                        <tr class="table-heading">
                            <td>New</td>
                        </tr>
                        <thead class="my-2">
                            <tr>
                                <th class="">#</th>
                                <th>Name</th>
                                <th >Symbol</th>
                                <th>Price</th>
                                <th>Launch</th>
                                <th>CMC | CG</th>
                                <th>Audit</th>
                                <th>KYC</th>
                                <th>upvote</th>
                                <th>more</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $a=1;
                        $xyz=0;
                        @endphp
                        @foreach($per_coin as $row_per)
                            @php $xyz++; @endphp
                            <tr>

                                <td>1</td>
                                <td>
                                   
                                         <a href="{{url('coins', ['id'=>$row_per->id])}}"  class="name"><img src="{{$row_per->logo_link}}"><b>{{$row_per->name}}</b></a>
                                  
                                   </td>
                                <td>
                                    <a href="{{url('coins', ['id'=>$row_per->id])}}">{{$row_per->sym}}</a>
                                  
                                </td>   
                                <td><a href="{{url('coins', ['id'=>$row_per->id])}}">${{number_format($row_per->mark_cap , 2,'.', ',' )}}</a></td>
                                @php

                                    $later_row_per = new DateTime($row_per->launch_date);
                                    $diff_row_per = $today->diff($later_row_per)->format("%a");  @endphp
                                @if($row_per->launch_date<$dt)
                                    <td ><a href="{{url('coins', ['id'=>$row_per->id])}}">{{$diff_row_per}} days</a></td>
                                @elseif($row_per->launch_date==$dt)
                                    <td> Launch Today</td>
                                @else
                                    <td><a href="{{url('coins', ['id'=>$row_per->id])}}">Launch in {{$diff_row_per}} days</a></td>

                                @endif



                                @if(Auth::user())
                                    @php


                                        $check=DB::select("select * from coin_votes where ((coin_id=$row_per->id) and ((user_id=$us) or (user_id=$get_ses)))");

                                        $check=count($check);

                                    @endphp

                                    @if($check==0)
                                        <td  class="vo1{{$row_per->id}}"> <span abc="{{$row_per->id}}">{{$row_per->vote}}</span></td>
                                    @else
                                        <td  class="vo1{{$row_per->id}}"><span abc="{{$row_per->id}}">{{$row_per->vote}}</span></td>
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



                                @endif
                                <td></td>
                                <td></td>
                                <td><button class="vote-btn">321</button></td>
                                <td>Info</td>
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