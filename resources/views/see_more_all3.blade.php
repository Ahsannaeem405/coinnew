@foreach($monthly_coin as $row_wk)
                        @php 
                             $dt=date('Y-m-d');
                              $today = new DateTime($dt);
                            
                            @endphp
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
                            @if(count($monthly_coin) == 30)
                            <tr class="cap_new1">
                                <td colspan="5">
                                    <center>
                                        <button class="sbn btn btn-sm btn-outline-primary set3" last_id="{{$monthly_coin[29]->id}}" style="width:40%;">See All</button>
                                    </center>
                                </td>
                            </tr>        
                            @endif
                        @endforeach