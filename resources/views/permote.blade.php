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
        thead tr{
            border-top: 2px solid black;

        }
        table tbody{
            background-color: #E9F0F8;
            border:0px solid #E9F0F8;
            border-bottom-left-radius: 30px;


             

        }
        table th{ 
            text-align: center;
   
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
 td button{
     margin-top:14px;
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
    font-size:0.50rem;
 }
 .table tbody tr td a img{
    width: 10px;
    height: 10px;
 }
 .tdd a{
     margin-top:12px;
 }
 .tddd a{
     margin-top:12px;
 }
  td button{
         margin-top: 5%;
   
    padding: 0.20rem;
 }
 .table td, .table th {
    padding: .32rem;
  }
  .tab-content {
      margin-top:-25%;
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

 <div class="container-fluid">
                    <table class="table table-hover" id="promoted_1">
                        

                        <thead>
                        <tr style="border-top: 2px solid black;">
                            <th style="text-align:left!important;"> Promoted Coins</th>
                            <th class="som">Symbol</th>
                            <th>Market Cap</th>
                            <th>Launch</th>
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


                                <td class="tddd">
                                   
                                         <a href="{{url('coins', ['id'=>$row_per->id])}}"><img src="{{$row_per->logo_link}}"><b>{{$row_per->name}}</b></a>
                                  
                                   </td>
                                <td class="tdd som">
                                    <a href="{{url('coins', ['id'=>$row_per->id])}}">{{$row_per->sym}}</a>
                                  
                                </td>   
                                <td class="tdd"><a href="{{url('coins', ['id'=>$row_per->id])}}">${{number_format($row_per->mark_cap , 2,'.', ',' )}}</a></td>
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
                                        <td style="text-align:center;" class="vo1{{$row_per->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_per->id}}" type="button">🚀<span>{{$row_per->vote}}</span></button></td>
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
                    
                    <table class="table table-hover" style="display:none;" id="promoted_2">
                        

                        <thead>
                        <tr>
                            <th style="text-align: left!important;"> Promoted Coins</th>
                            <th class="som">Symbol</th>
                            
                            <th>Market Cap</th>
                            <th>Launch</th>
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
                    
                    
                    @if($xyz==10)
                    <div style="width: 100%;text-align: center;"><button class="sbn btn btn-sm btn-outline-primary set5" style="width:40%;margin-right: 0;margin-left: 0;">See All</button>
                    </div>
                @endif
          </div>








          <script type="text/javascript">
            $(document).on("click" ,'.set5', function(){
                $("#promoted_1").hide();
                $(".set5").hide();
                document.getElementById("promoted_2").style.display = "inline-table";


            });
          </script>