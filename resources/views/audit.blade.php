@extends('../layouts/main')
@section('title')
Audit
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
					@php
					$sub=App\Models\AuditDesc::first();
				   // dd( $sub);
				@endphp
					<div class="form-wrapper">
							<h2 class="title">Audit</h2>
							<p class="my-2 text-white">{{$sub->audit_desc}}</p>

							<form method="POST" class="login-form" action="{{ url('user/audit') }}">
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
										box-shadow: 0px 0px 5px rgba(0,0,0,0.5);
										margin-top:3%"
										>Submit</button>
							</form>
						</div>
				</center>
			</div>
		</div>

	</div>
</div>
@endsection
