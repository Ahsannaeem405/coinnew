@extends('../layouts/main')
@section('title')
Promotion
@endsection
@section('body_content')
<div class="container">
	<div class="row mb-5 mt-5" style="background-color:#eff2f7;">
		@if(Session::has('success'))
  <div class="alert alert-success" style="width:100%;">
    {{ Session::get('success') }}
      @php
        Session::forget('success');
      @endphp
  </div>
@endif
		<div class="col-md-8 offset-md-2 ">
			<center><img src="{{ asset('upload/images/'.$promote->logo) }}" width="50%"></center>
			<center>
				<h1>{{ $promote->title }}</h1>
				{{-- <p>Get the visibility you need. By promoting on coinmars, your coin/banner will be visible on top of all other coins..</p> --}}

			</center>
			<center>
				
				{{-- <p>
				To promote your coin & to discuss the best Promotion Options for you<br>
               	Do never pay anyone for a promotion on our platform, unless you have received a confirmation email from this address ! (There are a lot of Scammers - be aware !) --}}
                   <p>{{ $promote->content }}</p>
                   <span style="color:#007bff;">Mail to: {{ $promote->email }} or Telegram</span><br>
                   <div class="form-wrapper mt-5">
						<h2 class="title">Contact us</h2>

						<form method="POST" class="login-form" action="{{ url('user/contact') }}">
                        @csrf
							<input type="text" name="name" placeholder="Name"
							    style=" width: 100%;
									    height: 55px;
									    border: 1px solid #edeef1;
									    padding: 0 25px;
									    border-radius: 3px;" value="@if(Auth::user()){{Auth::user()->name}} @endif">


						    <input type="text" name="email" placeholder="Email"
							    style=" width: 100%;
									    height: 55px;
									    border: 1px solid #edeef1;
									    padding: 0 25px;
									    border-radius: 5px;margin-top:3%;" value="@if(Auth::user()){{Auth::user()->email}} @endif">

                            <textarea rows="7" name="msg" cols="5" placeholder="Type Your Message"
                                style=" width: 100%;
									    border: 1px solid #edeef1;
									    padding: 0 25px;
									    border-radius: 5px;margin-top:3%;"></textarea>
							<button class="btn btn-info"
							style="width: 250px;

								    color: #fff;
								    text-align: center;
								    font-size: 16px;
								    border-radius: 25px;
								    margin-bottom:17%;
								    margin-top:3%">Submit</button>
						</form>
					</div>
			</center>
		</div>

	</div>
</div>
@endsection
