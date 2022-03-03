@extends('../layouts/main')
@section('title')
KYC
@endsection
@section('body_content')
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
		<div class="col-md-10 ">
			<div class="contact-div p-5">
				
				<center>
					
					<div class="form-wrapper">
							<h2 class="title">KYC</h2>

							<form method="POST" class="login-form" action="{{ url('user/contact') }}">
							@csrf
								<input type="text" name="name" placeholder="Name" class="theme-input"
									 value="@if(Auth::user()){{Auth::user()->name}} @endif">


								<input type="text" name="email" placeholder="Email" class="theme-input"
									style=" " value="@if(Auth::user()){{Auth::user()->email}} @endif">

								<textarea rows="7" name="msg" cols="5" placeholder="Type Your Message"
									style=" width: 100%;
											border: 1px solid #edeef1;
											padding: 0 25px;
											border-radius: 5px;margin-top:3%;"></textarea>
								<button class="btn btn-info"
								style="width: 250px;
										background-color: #e2ab10;
										border: none;
										color: #fff;
										text-align: center;
										font-size: 22px;
										border-radius: 25px;
										margin-top:3%">Submit</button>
							</form>
						</div>
				</center>
			</div>
		</div>

	</div>
</div>
@endsection
