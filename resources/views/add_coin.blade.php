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
		    background-color: #eef0f3;
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
	.add-btn{

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
	<div class="row mb-5 mt5" style="background-color: #323131;
    padding: 3rem;
    border-radius: 2rem;
	border: 8px solid #FECD41;
    color:white;
    margin-top: 4%;">
		
		<div class="col-md-12">
			<center>
				<h3 class="title mt-4 ">
					    			Coin listing request

					    		</h3>
				
                <div class="form-wrapper mt-5">
						
						
						<form method="POST" class="login-form" action="{{ url('user/coin_save') }}">
                        @csrf
					    <div class="row">
					    	<div class="col-md-6">
					    		<h4 class="title" style="float: left;">
					    			Coin informations

					    		</h4><br>
                               
                                <label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Name<span style="color: red;font-size:14px;">&nbsp;&nbsp;Required</span></label>
					    		
					    		<input type="text" placeholder="e.g. Bitcoin" 
							    style="" class="t1" name="name" required>
                                <label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Symbol<span style="color: red;font-size:14px;">&nbsp;&nbsp;Required</span></label>
							    <input type="text" placeholder=": e.g. BTC" 
								    class="t1" name="sym" required>
                                <label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Description<span style="color: red;font-size:14px;">&nbsp;&nbsp;Required</span></label>
	                            <textarea rows="7" cols="5" required name="des" placeholder="e.g. Bitcoin is a decentralized digital currency"
	                                style=" width: 100%;
										    background-color: #eef0f3;
		                                    border: 0px solid #232A32;
										    padding: 0 25px;
										    border-radius: 5px;"></textarea>

								<label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Logo Link<span style="color: red;font-size:14px;">&nbsp;&nbsp;Required</span></label>  
								<input type="text" placeholder="Logo Link" 
								    class="t1" name="logo_link" required>
								<input type="checkbox" name="checkbox" id="checkbox" value="presale" / style="float: left;margin-top:4%;"><label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Presale</label>   
								<label class="form-label mark_cap" style="margin-top:3%;color:white;display: block;text-align: left;">Market Cap Price in USD</label>  
								<input placeholder="e.g. USD 15,000"   type="number" id="mark_cap" class="form-control t1" name="mark_cap"  step=any >


								    
								<label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Price in USD</label>  
								<input placeholder="e.g. 0.00001" type="number" id="formPrice" class="form-control t1" name="act_price"  step=any >
								
								<label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Additional information, other links and addresses</label> 
								<textarea rows="7" cols="5" name="other" placeholder="Other links, other blockchain contracts or anything else you would like to add to your coin request"
                                style=" width: 100%;
									    background-color: #eef0f3;
		                                border: 0px solid #232A32;
									    padding: 0 25px;
									    border-radius: 5px;"></textarea> 
								<label class="form-label" for="formLaunch" style="margin-top:2%;color:white;">Launch date<span style="color: red;font-size:14px;">&nbsp;&nbsp;Required</span></label>
								<input required="" type="datetime-local" id="formLaunch" class="form-control t1" name="launch_date">
					    		
					    	</div>
					    	<div class="col-md-6">
					    		<h4 class="title" style="float: left;">Coin contracts</h4><br><hr>
					   
					    		<label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Chain<span style="color: red;font-size:14px;">&nbsp;&nbsp;Required</span></label>
							    
                                <select class="t1" name="address_name" style="color: white;" required>
                                	<option>Ethereum</option>
                                	<option>Solana</option>
                                	<option>Binance Smart Chain</option>
                                	<option>Tron</option>
                                	<option>Polygon</option>
                                	<option>KuCoin Community Chain</option>
                                	<option>Hashgraph</option>
                                	<option>Cardano</option>
                                </select>
                                <label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Address<span style="color: red;font-size:14px;">&nbsp;&nbsp;Required</span></label>
								    
								<input type="text" 
								    class="t1" name="address" required>
							    
								
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
								    class="t1" name="telegram">
								<label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Website</label>
								<input type="text" placeholder="e.g. www.example.com" 
								    class="t1" name="web">
								<label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Facebook</label>
							    <input type="text" placeholder="e.g. https://facebook.com" 
							    class="t1" name="facebook">
							    <label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Twitter</label>
							    <input type="text" placeholder="e.g. https://twitter.com/bitcoin" class="t1" name="twi">
							    <label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Instagram</label>
							    <input type="text" placeholder="e.g. https://insta.com" 
							    class="t1" name="insta">
							    <label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Reddit</label>
							    <input type="text" placeholder="e.g. https://reddit.com" 
							    class="t1" name="rec">
							    <label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Youtube</label>
							    <input type="text" placeholder="e.g. https://youtube.com" 
							    class="t1" name="youtube">
							    <label class="form-label" style="margin-top:3%;color:white;display: block;text-align: left;">Chart</label>
							    <input type="text" placeholder="e.g. https://chart.com" 
							    class="t1" name="chart">
							   
							    
					    		
					    	</div>
					    </div>
							
							
							
							<button class="btn btn-info t2 t1"  class="add-btn"
							style="width: 250px;
							        border:none;
								    background-color:#F7D26C;
								    color: #fff;
								    text-align: center;
								    font-size: 16px;
								    border-radius: 25px;
								    margin-bottom:7%;
								    margin-top:3%">Submit</button>		    
						</form>
					</div>
			</center>
		</div>
		
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
	 $(function () {
      
        //show it when the checkbox is clicked
        $('input[name="checkbox"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('input[name="mark_cap"]').hide();
                $('.mark_cap').hide();
            } else {
            	$('input[name="mark_cap"]').fadeIn();
            	$('.mark_cap').fadeIn();


                
            }
        });
    });
</script>
@endsection