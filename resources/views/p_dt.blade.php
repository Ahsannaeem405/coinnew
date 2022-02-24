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
	

	
	.bty{
		width: 80%;
		border: 1px solid #9488f0;
		color: white;
		margin-bottom: 3%;
		
	}
	.bty a{
		color: white;
		
	}

	.bty:hover{
		background-color:#9488f0;
		
	}
	.per_out_sbn{
		height: 4.5rem;
	    width: 19rem;
	    font-size: 2.8rem;
	    color: #28a745;
	    border: 1px solid #28a745;
	    border-radius: .5rem;
	    margin-bottom:5%;
	    margin-top: 5%;
	    text-align:center;


	}
	.per_out_sbn:hover{
		background-color: #28a745;
		border: 2px solid #28a745;
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
		background-color:#28a745;
		border: 1px solid #28a745;
		color: white;
		
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
   
                    <div class="container-fluid mt-3" style=" padding-left: 8%;
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
    </div>
@foreach($coin as $row)
<div class="container-fluid mt-3">
	<div class="row marv ml-1 mb-4 mr-1" style="background-color:#181d23;border-radius: 15px;color:white;">
		<div class="col-md-8 mb-3">

			<div class="row mt-3">
				<div class="col-md-2">
					<img src="{{$row->logo_link}}" alt="Logo" style="height: 100px; width: 100px; margin-right: 5px;">
				</div>
				<div class="col-md-10">
					<h3 style="font-size:1.75rem;color:white;margin-top:2%;">{{$row->name}}</h3>
					

					<span style="background-color: rgb(148, 136, 240);
	                            height: 2.6rem;
	                            line-height: 2.6rem;
	                            font-size: 1.4rem;
	                            display: inline-flex;
	    
	                           font-weight: 600;
	                           padding: 0px 1rem;
	                           border-radius: 1rem;">{{$row->sym}}</span>
					<span style="background-color: rgb(35, 42, 50);

	                            height: 2.6rem;
	                            line-height: 2.6rem;
	                            font-size: 1.4rem;
	                            display: inline-flex;
	    
	                           font-weight: 600;
	                           padding: 0px 1rem;
	                           border-radius: 1rem;">Today Votes {{$row->vote}}</span>
	                           <span style="background-color: rgb(35, 42, 50);

	                            height: 2.6rem;
	                            line-height: 2.6rem;
	                            font-size: 1.4rem;
	                            display: inline-flex;
	    
	                           font-weight: 600;
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
		<div class="col-md-4 mt-4" >

			
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
                <span  class="per_vo1{{$row->id}}"><button class="per_out_sbn btn btn-sm btn-outline-primary per_vo1" abc="{{$row->id}}" type="button" fl>🚀<span>{{$row->vote}}</span></button></a></span>
                @else
                <span  class="per_vo1{{$row->id}}"><button class="btn btn-sm per_sbn btn-primary per_un_vo1" abc="{{$row->id}}" type="button">🚀<span>{{$row->vote}}</span></button></span>
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
                
                   <span  class="per_vo1{{$row->id}}"><button class="per_out_sbn btn btn-sm btn-outline-primary per_vo1" abc="{{$row->id}}" type="button"><span>{{$row->vote}}</span></button></a></span>
                @else
                     <span  class="per_vo1{{$row->id}}"><button class="btn btn-sm per_sbn btn-primary per_un_vo1" abc="{{$row->id}}" type="button"></i><span>{{$row->vote}}</span></button></span>
                   
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
@include('permote')
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