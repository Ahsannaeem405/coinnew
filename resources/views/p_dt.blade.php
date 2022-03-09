@extends('../layouts/main')
@section('title')
Add Coin
@endsection   
@section('body_content')
<style type="text/css">
	.t1{
		width: 100%;
	    height:45px;
	    border: 1px solid #edeef1;
	    padding: 0 25px;
	    border-radius: 3px;
	    margin-top:2%;
	}
	.btn-primary ,.btn-outline-primary{
		width: 100%;

	}
    tr td img {
		width: 60px;
		height: 60px;
	}
	

	
	.bty{
		width: 80%;
		border: 1px solid #e2ab10;
		color: white;
		margin-bottom: 3%;
	}
    @media screen and (max-width:768px){
        .bty{
		width: 100%;
	}
    }
	.bty a{
		color: white;
		
	}

	.bty:hover{
		background-color: #e2ab10;
		
	}
	.per_out_sbn{
		height: 4.5rem;
	    width: 19rem;
	    font-size: 2.8rem;
	    color: #fff;
	    border: 1px solid #28a745;
	    border-radius: .5rem;
	    margin-bottom:5%;
	    margin-top: 5%;
	    text-align:center;

	}
	.per_out_sbn:hover{

        border: 1px solid #28a745;
	}


	.per_sbn{
		height: 4.5rem;
	    width: 19rem;
	    font-size: 2.8rem;
	    background-color:#28a745;
	    color: white;
	    border: 1px solid #28a745;
	    border-radius: .5rem;
	    margin-bottom:5%;
	    margin-top: 5%;
	    text-align:center;


	}

	.sbn:hover{
		
		
	}
	.container-fluid{
    padding-left:8%;
      padding-right:8%;  
  }



@media screen and (max-width: 600px) {    
	
 .marv{margin-left:0%!important;margin-right: 0%!important;}   

.per_out_sbn{
	    width: 10rem!important;
	}
	.per_sbn{
		
	    width: 10rem!important;
	     font-size: 2.8rem!important;
	   


	}

    
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <!--stylesheets / link tags loaded here-->

    <link rel="stylesheet" href="{{asset('style.css')}}">

    @php $images=App\Models\slider_img::take('1')->orderBy('id', 'DESC')->get();
    $images2=App\Models\slider_img::orderBy('id', 'DESC')->get();
 $images3=App\Models\ban_slider_img::orderBy('id', 'DESC')->get();
    @endphp
    @if(Session::has('success'))
        <div class="alert alert-success" style="width:100%;">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif
   
                    <!-- <div class="container-fluid mt-3" style=" padding-left: 8%;
                        padding-right: 8%;">
                        <div class="row">
                            @foreach($images3 as $row_img3)

                            <a href="{{$row_img3->url}}" style="text-align: center;margin-left: auto;margin-right: auto;">
                                
                                <img class="img-fluid log_ban rounded mb-2" src="{{url('upload/images/'.$row_img3->file)}}" width="100%"></a>
                       
                            @endforeach
                        </div>    
                    </div>

                    <div class="row mx-auto my-auto">
                        <div id="myCarousel" class="carousel slide container-fluid" data-ride="carousel">
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
                        
                        </div>
                    </div> -->

@foreach($coin as $row)
<div class="container-fluid mt-3">
	<div class="row marv ml-1 mb-4 mr-1">
		<div class="col-lg-8 col-12 mb-3">
                <div class="row mt-3 justify-content-center">
                    <div class="col-lg-2 col-md-3 col-5">
                        <img src="{{$row->logo_link}}" alt="Logo" style="height: 100px; width: 100px; margin-right: 5px;" class="mx-auto">
                    </div>
                    <div class="col-lg-10 col-md-7 text-center">
                        <h3 style="font-size:1.75rem;color:white;margin-top:2%;" class="text-center">{{$row->name}}</h3>
                        <span class="mx-2 mt-2" style="background-color: rgb(148, 136, 240);
                                    height: 2.6rem;
                                    line-height: 2.6rem;
                                    font-size: 1.4rem;
                                    display: inline-flex;
                                    color: white;
                                font-weight: 600;
                                padding: 0px 1rem;
                                border-radius: 1rem;">{{$row->sym}}</span>
                        <span class="mx-2 mt-2" style="background-color: rgb(35, 42, 50);

                                    height: 2.6rem;
                                    line-height: 2.6rem;
                                    font-size: 1rem;
                                    display: inline-flex;
                                    color: white;
                                font-weight: 500;
                                padding: 0px 1rem;
                                border-radius: 1rem;">Today Votes {{$row->vote}}</span>
                                <span class="mx-2 mt-2" style="background-color: rgb(35, 42, 50);

                                    height: 2.6rem;
                                    line-height: 2.6rem;
                                    font-size: 1rem;
                                    display: inline-flex;
                                    color: white;
                                font-weight: 500;
                                padding: 0px 1rem;
                                border-radius: 1rem;">Votes {{$tod}}</span>


                        
                    </div>
                </div>
            
			<h4 class="mt-4" style="color:white;">Contracts:</h4>
			<div class="input-group mb-3"> 
			  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{$row->address}}" style="cursor: pointer;color: white;height: 38px;background-color: #181d23;margin-top: 12px;" id="myInput" readonly="" >
			  <div class="input-group-append">
			    <span class="input-group-text" onclick="myFunction()" style="color: white;background-color: #181d23;height: 38px;margin-top: 12px;">copy</span>
			  </div>
			</div>
			<p style="color:#a1a5aa;">{{$row->des}}</p>
		</div>
		<div class="col-lg-4 col-12 mt-4" >
			<h6 style="font-weight:normal;color:white;">Price</h6>
			<h6 style="font-size:1.45rem;font-weight:normal;color:white;">${{$row->act_price}}</h6>
			<h6 style="font-weight:normal;margin-top:4%;color:white;">Market Cap</h6>
			<h6 style="font-size:1.45rem;font-weight:normal;color:white;">
				${{number_format($row->mark_cap , 2,'.', ',' )}}</h6>
			<!-- 
			 -->
			<h6 style="font-weight:normal;margin-top:4%;color:white;">Launch date</h6>
			<h6 style="font-size:1.45rem;font-weight:normal;color:white;margin-bottom:7%;">
                {{ date('M d, Y', strtotime($row->launch_date))}}
				</h6>
				@if($row->telegram!=null)  
	                        <button class="btn  btn-sm bty btn-outline-primary" type="button"><a href="{{$row->telegram}}">
	                        Telegram</a></button><br>
	            @endif
	            @if($row->web!=null)   
	                        <button class="btn btn-sm bty btn-outline-primary" type="button"><a href="{{$row->web}}">Website</a></button><br>
				@endif
						@if($row->facebook!=null)   
	                        <button class="btn btn-sm bty btn-outline-primary" type="button"><a href="{{$row->facebook}}">Facebook</a></button><br>
						@endif
						 @if($row->twi!=null)   
	                        <button class="btn btn-sm bty btn-outline-primary" type="button"><a href="{{$row->twi}}">Twitter</a></button><br>
						@endif
						@if($row->rec!=null)   
	                        <button class="btn btn-sm bty btn-outline-primary" type="button"><a href="{{$row->rec}}">Recent cleanups</a></button><br>
						@endif
						@if($row->youtube!=null)   
	                        <button class="btn btn-sm bty btn-outline-primary" type="button"><a href="{{$row->youtube}}">Youtube</a></button><br>
						@endif
						@if($row->insta!=null)   
	                        <button class="btn btn-sm bty btn-outline-primary" type="button"><a href="{{$row->insta}}">Instagram</a></button><br>
						@endif
						@if($row->chart!=null)   
	                        <button class="btn btn-sm bty btn-outline-primary" type="button"><a href="{{$row->chart}}">chart</a></button><br>
						@endif
		</div>
		<div class="col-md-6 col-6 offset-3">
		@if(Auth::user())
            @php
             if(Auth::user())
			 {
			 $us=Auth::user()->id;
			 }
			 else{
			 $us=0;
			 }
              $check=DB::select("select * from coin_votes where coin_id=$row->id or user_id=$us");
              $check=count($check);
            @endphp

                @if($check==0)
                <span  class="per_vo1{{$row->id}}"><button class="per_out_sbn btn btn-sm btn-outline-success per_vo1" abc="{{$row->id}}" type="button" fl>🚀<span>{{$row->vote}}</span></button></a></span>
                @else
                <span  class="per_vo1{{$row->id}}"><button class="btn btn-sm per_sbn btn-success per_un_vo1" abc="{{$row->id}}" type="button">🚀<span>{{$row->vote}}</span></button></span>
                @endif 
            @else
                @php
                if(Session::has('id'))
                    {
                    $get_ses=Session::get('id');
                    
                    }
                    else{
                     $get_ses=0;
                     
                    }
               
               
                $ses_check=App\Models\coin_vote::where('coin_id',$row->id)->where('user_id',$get_ses)->count();

               
                @endphp
                @if($ses_check==0)
                
                   <span  class="per_vo1{{$row->id}}"><button class="per_out_sbn btn btn-outline-success btn-sm  per_vo1" abc="{{$row->id}}" type="button"><span>{{$row->vote}}</span></button></a></span>
                @else
                     <span  class="per_vo1{{$row->id}}"><button class="btn btn-sm per_sbn btn-success per_un_vo1" abc="{{$row->id}}" type="button"></i><span>{{$row->vote}}</span></button></span>
                   
                @endif   

              

            @endif
        </div>    
	</div>
  
	<!-- <div class="row marv ml-5 mb-5 mr-5" style="border-radius: 15px;color:white;">
		
	    <h4>Discussion</h4>
    </div> -->
	<!-- <div class="row marv ml-5 mb-5 mr-5" style="background-color:#eff2f7;border-radius: 15px;">

		<div class="col-md-12">
			<div style="max-height:280px;overflow-x: hidden;  flex-direction: column-reverse;" class="table-responsive demo" id="msg">
			@foreach($row->coin_coment as $row2)
			<div class="row mt-3 mb-3" >
				<div class="col-md-1 col-2">
					<div style="background: rgb(27, 61, 80); width: 40px; height: 40px; border-radius: 50%; display: flex; justify-content: center; align-items: center; transition: all 0.5s ease 0s;margin-left:23%;color:white;"><?php
                        echo substr( ucwords($row2->user_name->name), 0,1)?></div>
				</div>
				<div class="col-md-9 col-10">
					<h6>{{$row2->user_name->name}} <span style="font-size:12px;">{{ date('M d h:i:a', strtotime($row2->created_at))}}</span></h6>
					<p>{{$row2->com}}</p>
				</div>

			</div>
			
			@endforeach
		    </div>
			
			
			<hr>
			<div class="row mt-3 mb-2">
				<div class="col-md-1 col-2">
					<div style="background: rgb(27, 61, 80); width: 40px; height: 40px; border-radius: 50%; display: flex; justify-content: center; align-items: center; transition: all 0.5s ease 0s;margin-left:23%;color:white;">@if(Auth::user())<?php
                        echo substr( ucwords(Auth::user()->name), 0,1)?>@endif</div>
				</div>
				<div class="col-md-9 col-10">
					@if(Auth::user())
					<p style="float: left; font-size: 12px;">{{ucwords(Auth::user()->name)}}</p><br>
					@endif
                        <form method="POST" class="login-form" action="{{ url('user/com_save') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$row->id}}">
					    <input placeholder="What do you think about this coin" name="com" maxlength="100" required="" id="comment" class="form-control" value="" style="width:100%;">
					@if(Auth::user())
					   <button type="submit" class="btn btn-primary" style="margin-top: 16px;float: right;">Submit</button>
					@else
					<a href="url('log_in')" style="color: white;float: right;">
					<button class="btn btn-primary" style="margin-top: 16px;float: right;">
						

					Submit</button></a>

					@endif   
				</div>

			</div>
			
			
		</div>
	</div> -->
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center><p>Adress sccessfully copy</p></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
<div class="container-fluid cony mt-lg-5 mt-0 pr-0 pl-1 px-lg-5 pt-0 pt-lg-0">
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

      <table class="w-100 mytable mt-5" id="promoted_1">    
          <tr class="table-heading">
              <td>Promoted</td>
          </tr>
          <thead class="my-2">
              
              <tr>
                  <th class="">#</th>
                  <th>Name</th>
                  <th >Symbol</th>
                  <th>Price</th>
                  <th>Launch</th>
                  <th class="mobile-hide">CMC | CG</th>
                  <th class="mobile-hide">Audit</th>
                  <th class="mobile-hide">KYC</th>
                  <th>vote</th>
                  <th>upvote</th>
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
                      <td ><a href="{{url('coins', ['id'=>$row_per->id])}}">{{$diff_row_per}} days</a></td>

                  @endif
                  <td class="mobile-hide">{{$row_per->cmc}}</td>
                  <td class="mobile-hide"><button class="vote-btn">{{$row_per->audit}}</button></td>
                  <td class="mobile-hide"><button class="vote-btn">{{$row_per->kyc}}</button></td>
                  @if(Auth::user())
                      @php


                          $check=DB::select("select * from coin_votes where ((coin_id=$row_per->id) and ((user_id=$us) or (user_id=$get_ses)))");

                          $check=count($check);

                      @endphp

                      @if($check==0)
                          <td style="text-align:center;" class="vo1{{$row_per->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_per->id}}" type="button"><span>{{$row_per->vote}}</span></button></a></td>
                      @else
                          <td style="text-align:center;" class="vo1{{$row_per->id}}"><button class="btn btn-sm sbn btn-primary un_vo1" abc="{{$row_per->id}}" type="button"><span>{{$row_per->vote}}</span></button></td>
                      @endif
                       {{--devote start--}}
                       @if($check==0)
                          <td style="text-align:center;" class="devote{{$row_per->id}}"><button class="sbn btn btn-sm btn-outline-danger devote  col-12 col-md-6" devote="{{$row_per->id}}" type="button"><span>{{$row_per->devote}}</span></button></td>
                      @else
                          <td style="text-align:center;" class="un_devote{{$row_per->id}}"><button class="btn btn-sm sbn btn-danger un_devote col-12 col-md-6" un_devote="{{$row_per->id}}" type="button"><span>{{$row_per->devote}}</span></button></td>
                      @endif    
                  @else
                      @php
                          $ses_check=App\Models\coin_vote::where('coin_id',$row_per->id)->where('user_id',$get_ses)->count();
                      @endphp
                      @if($ses_check==0)
                          <td style="text-align: center;" class="vo1{{$row_per->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1" abc="{{$row_per->id}}">{{$row_per->vote}}</button></a></td>
                      @else
                          <td style="text-align: center;" class="vo1{{$row_per->id}}"><button class="btn btn-sm sbn btn-primary un_vo1" abc="{{$row_per->id}}">{{$row_per->vote}}</button></td>
                      @endif
                       {{--devote start--}}
                       @if($check==0)
                          <td style="text-align:center;" class="devote{{$row_per->id}}"><button class="sbn btn btn-sm btn-outline-danger devote  col-12 col-md-6" devote="{{$row_per->id}}">{{$row_per->devote}}</button></td>
                      @else
                          <td style="text-align:center;" class="un_devote{{$row_per->id}}"><button class="btn btn-sm sbn btn-danger un_devote col-12 col-md-6" un_devote="{{$row_per->id}}">{{$row_per->devote}}</button></td>
                      @endif    
                  @endif
                 
                  <td>  <a href="{{url('coins', ['id'=>$row_per->id])}}">Info</a></td>
              </tr>
          @endforeach
          
              
          </tbody>
      </table>

          @if($xyz==10)
          <div style="width: 100%;text-align: center;"><button class="sbn btn btn-sm btn-outline-primary set5" style="width:40%;margin-right: 0;margin-left: 0;">See All</button>
          </div>
      @endif
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  $('#exampleModal').modal("show");
  
}



</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


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
               op+='<button class="btn btn-sm btn-primary un_vo1" type="button" abc='+data.id+'>'+data.dat+'</button>';
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
               op+='<button class="btn btn-sm btn-outline-primary vo1" type="button" abc='+data.id+' style="">'+data.dat+'</button>';
               $('.vo1'+ids).append(op);

             
              
            },
          });
          set=0;
        }
        else{
                alert('You Have To wait for 30s for next vote');
        }
    });




    $(document).on("click",'.per_vo1' , function(){
    if(set>=30)
    {        
      var ids=$(this).attr('abc');
      //alert(ids1)
     
      $.ajax({
            type: 'get',
            url:"{{ url('/vote') }}",
          
            data: {'id':ids},

            success: function (data) {
               $('.per_vo1'+ids).empty();
               var op =" ";
               op+='<button class="btn btn-sm per_sbn btn-primary per_un_vo1" type="button" abc='+data.id+'>'+data.dat+'</button>';
               $('.per_vo1'+ids).append(op);

             
              
            },
          });
        set=0;
	    }
	else{
	                alert('You Have To wait for 30s for next vote');
	    }
    });

    $(document).on("click" ,'.per_un_vo1', function(){
    if(set>=30)
    {          
      var ids=$(this).attr('abc');
      //alert(ids1)
     
      $.ajax({
            type: 'get',
            url:"{{ url('/un_vote') }}",
          
            data: {'id':ids},

            success: function (data) {
               $('.per_vo1'+ids).empty();
               var op =" ";
               op+='<button class="btn btn-sm  per_out_sbn btn-outline-primary per_vo1" type="button" abc='+data.id+' style="">'+data.dat+'</button>';
               $('.per_vo1'+ids).append(op);

             
              
            },
          });
       set=0;
        }
    else{
                alert('You Have To wait for 30s for next vote');
        }
    });
});




</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{asset('carousel.js')}}"></script>
@endforeach
@endsection