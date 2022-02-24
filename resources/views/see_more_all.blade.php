@php  $al_k=0; @endphp

 @foreach($all_coin2 as $key=>$row)
 
       @php
       $idd=$id;
       $in=$idd*30;
       $fin_in=$in-1;
     
       
       @endphp 
        @if($key > $fin_in)
        { 
                             @php
                             
                             $al_k++;
                            
                             $dt=date('Y-m-d');
                              $today = new DateTime($dt);
                            
                            @endphp

                            <tr id="cp{{$row->id}}" >


                                <td class="tddd"><a href="{{url('coins', ['id'=>$row->id])}}"><img src="{{$row->logo_link}}"><b>{{$row->name}}</a></td>
                                <td class="tdd som">
                                    <a href="{{url('coins', ['id'=>$row->id])}}">{{$row->sym}}</a>
                                  
                                </td> 
                                <td class="tdd"><a href="{{url('coins', ['id'=>$row->id])}}">${{number_format($row->mark_cap , 2,'.', ',' )}}</a></td>
                                    
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

                                    if(Auth::user())
                                    {
                                       $check=DB::select("select * from coin_votes where coin_id=$row->id or user_id=$us");

                                      $check=count($check);
                                    }
                                @endphp
                                <td>
                                @if(Auth::user())

                                    @if($check==0) 
                                        <button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row->id}}" style=" width: 100%;" type="button">🚀{{$row->vote}}</button>
                                    @else
                                       <button class="btn btn-sm sbn btn-primary un_vo1" abc="{{$row->id}}" style=" width: 100%;" type="button">🚀{{$row->vote}}</button></a>
                                    @endif
                                @else
                                    @php


                                        $ses_check=App\Models\coin_vote::where('coin_id',$row->id)->where('user_id',$get_ses)->count();


                                    @endphp
                                    @if($ses_check==0)
                                       <button class="sbn btn btn-sm btn-outline-primary vo1" style=" width: 100%;" abc="{{$row->id}}" type="button">🚀{{$row->vote}}</button>
                                    @else
                                        <button class="btn btn-sm sbn btn-primary un_vo1" style=" width: 100%;" abc="{{$row->id}}" type="button">🚀{{$row->vote}}</button></a>
                                    @endif




                                @endif
                                  </td>  
                                
                                
                            </tr>
                            @if($al_k==30)
                                   @break  
                                
                            @endif    
            @endif

                        @endforeach
                        
                       
                        <tr class="cap1">
                        <td colspan="5"> 
                        <center>   
                        <button class="sbn btn btn-sm btn-outline-primary set1 cap1" no_time="<?php echo $idd; ?>"  style="width:40%;margin-right: 0;margin-left: 0;">Show More</button></center>
                        </td>
    
                        </tr>
                        
                        
                        
                       