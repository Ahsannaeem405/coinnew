
@extends('../layouts/main')
@section('title')
Add Coin
@endsection   
@section('body_content')

<style type="text/css">
	.t1{
		color:white;
		width: 100%;
	    height:45px;
	    border: 1px solid #edeef1;
	    padding: 0 25px;
	    border-radius: 3px;

	    
	}
	h3, h4{
		color: white;
	}
	.t1{
		    background-color: #232A32;
		    border: 0px solid #232A32;

	}
	.t2:hover{
		background-color:#9488f0;
	}
	.t1:hover{
		border:1px solid white;
	}
	textarea:hover{
		border:1px solid white;
	}

</style>

<div class="container">
	
@if(Session::has('success'))
  <div class="alert alert-success">
    {{ Session::get('success') }}
      @php
        Session::forget('success');
      @endphp
  </div>
@endif
	<div class="row mb-5 mt5" style="background-color: #181d23;
    padding: 3rem;
    border-radius: 2rem;
    color:white;
    margin-top: 4%;">
		
		<div class="col-md-12">
			<center>
				<h3 class="title mt-4 ">
					    			Coin listing request

					    		</h3>
				
                <div class="form-wrapper mt-5">
						
						{{-- @dd(date('m/d/y m:i a',strtotime($coin->launch_date))); --}}
						<form method="POST" class="login-form" action="{{ url('coinUpdate')}}/{{$coin->id}}" enctype="multipart/form-data">
                        @csrf
                        
					    <div class="row">
					    	<div class="col-md-6">
					    		<h4 class="title" style="float: left;">
					    			Coin informations

					    		</h4><br>
                               
                                <label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Name<span style="color: red;font-size:14px;">&nbsp;&nbsp;Required</span></label>
					    		
					    		<input type="text" placeholder="e.g. Bitcoin" 
							    style="" class="t1" value="{{$coin->name}}" name="name" required>
                                <label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Symbol<span style="color: red;font-size:14px;">&nbsp;&nbsp;Required</span></label>
							    <input type="text" placeholder=": e.g. BTC" 
								    class="t1" name="sym" value="{{$coin->sym}}" required>
                                <label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Description<span style="color: red;font-size:14px;">&nbsp;&nbsp;Required</span></label>
	                            <textarea class="t1" rows="7" cols="5" required name="des" placeholder="e.g. Bitcoin is a decentralized digital currency"
	                                style=" width: 100%;
										    background-color: #232A32;
		                                    border: 0px solid #232A32;
										    padding: 0 25px;
										    border-radius: 5px;">{{$coin->des}}</textarea>

								<label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Logo Link<span style="color: red;font-size:14px;">&nbsp;&nbsp;Required</span></label>  
								<input type="text" placeholder="Logo Link" 
								    class="t1" name="logo_link" required value="{{$coin->logo_link}}">
								<label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Price in USD</label>  
								<input placeholder="e.g. 0.00001" type="number" id="formPrice" class="form-control t1" name="act_price"  step=any value="{{$coin->act_price}}">
								<label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Price in USD</label>  
								<input placeholder="e.g. USD 15,000"   type="number" id="formMarketCap" class="form-control t1" name="mark_cap"  step=any value="{{$coin->mark_cap}}">
								<label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Additional information, other links and addresses</label> 
								<textarea rows="7" cols="5" name="other" placeholder="Other links, other blockchain contracts or anything else you would like to add to your coin request"
                                style=" width: 100%;
									    background-color: #232A32;
		                                border: 0px solid #232A32;
									    padding: 0 25px;
									    border-radius: 5px;">{{$coin->other}}</textarea> 
								<label class="form-label" for="formLaunch" style="margin-top:2%;color:white;">Launch date<span style="color: red;font-size:14px;">&nbsp;&nbsp;Required</span></label>
								<input type="datetime-local" id="formLaunch" class="form-control t1" value="{{date('m/d/y m:i a',strtotime($coin->launch_date))}}" name="launch_date">
								<input type="file"  class="t1 mt-3" name="image" required>
								<img src="{{asset('images')}}/{{$coin->image}}" class="mt-2" width="40" height="40" alt="">
					    	</div>
					    	<div class="col-md-6">
					    		<h4 class="title" style="float: left;">Coin contracts</h4><br><hr>
					   
					    		<label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Chain<span style="color: red;font-size:14px;">&nbsp;&nbsp;Required</span></label>
							    
                                <select class="t1" name="address_name" style="color: white;" required>
                                	<option  @if($coin->address_name=='Ethereum') selected @endif>Ethereum</option>
                                	<option @if($coin->address_name=='Solana') selected @endif>Solana</option>
                                	<option @if($coin->address_name=='Binance Smart Chain') selected @endif>Binance Smart Chain</option>
                                	<option @if($coin->address_name=='Ethereum') selected @endif>Tron</option>
                                	<option @if($coin->address_name=='Polygon') selected @endif>Polygon</option>
                                	<option @if($coin->address_name=='KuCoin Community Chain') selected @endif>KuCoin Community Chain</option>
                                	<option @if($coin->address_name=='Hashgraph') selected @endif>Hashgraph</option>
                                	<option @if($coin->address_name=='Cardano') selected @endif>Cardano</option>
                                </select>
                                <label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Address<span style="color: red;font-size:14px;">&nbsp;&nbsp;Required</span></label>
								    
								<input type="text" 
								    class="t1" name="address" value=" {{$coin->address}}" >
							    
								
								<!-- <input type="text" placeholder="Ethereum contract address" 
								    class="t1" maxlength="100" name="e_c_address">
								<input type="text" placeholder="Solana" 
								    class="t1" maxlength="100" name="sol_address">
					    		 -->
					    		<h4 class="title mt-4" style="float: left;display:block;">Coin links</h4>
					    		<br><hr class="mt-3" style="margin-top:4rem!important;">
					   
					    		<label style="float:left;display:block;">Add all links with http or https</label><br>
                                <label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;" required>Telegram<span style="color: red;font-size:14px;">&nbsp;&nbsp;Required</span></label>
								    
								<input type="text" placeholder="e.g. https://t.me/bitcoin" 
								    class="t1" name="telegram" value=" {{$coin->telegram}}">
								<label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Website</label>
								<input type="text" placeholder="e.g. www.example.com" 
								    class="t1" name="web" value=" {{$coin->web}}">
								<label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Facebook</label>
							    <input type="text" placeholder="e.g. https://facebook.com" 
							    class="t1" name="facebook" value=" {{$coin->facebook}}">
							    <label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Twitter</label>
							    <input type="text" placeholder="e.g. https://twitter.com/bitcoin" class="t1" name="twi" value=" {{$coin->twi}}">
							    <label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Instagram</label>
							    <input type="text" placeholder="e.g. https://insta.com" 
							    class="t1" name="insta" value=" {{$coin->insta}}">
							    <label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Reddit</label>
							    <input type="text" placeholder="e.g. https://reddit.com" 
							    class="t1" name="rec" value=" {{$coin->rec}}">
							    <label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Youtube</label>
							    <input type="text" placeholder="e.g. https://youtube.com" 
							    class="t1" name="youtube" value=" {{$coin->youtube}}">
							    <label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Chart</label>
							    <input type="text" placeholder="e.g. https://chart.com" 
							    class="t1" name="chart" value=" {{$coin->chart}}">
							   
							    
					    		
					    	</div>
					    </div>
							
							
							
							<button class="btn btn-info t2 t1" 
							style="width: 250px;
							        border: 1px solid #9488f0;
								    background-color:#232A32,
								    color: #fff;
								    text-align: center;
								    font-size: 16px;
								    border-radius: 25px;
								    margin-bottom:7%;
								    margin-top:3%">Update</button>		    
						</form>
					</div>
			</center>
		</div>
		
	</div>
</div>
@endsection