@extends('../layouts/main')
@section('title')
Newsletter
@endsection   
@section('body_content')
<div class="container">
	@if(Session::has('success'))
  <div class="alert alert-success">
    {{ Session::get('success') }}
      @php
        Session::forget('success');
      @endphp
  </div>
@endif
	<div class="row mb-5 mt-5" style="background-color:#eff2f7;">
		<div class="col-md-6">
			<img src="{{asset('crypto/images/icon/news.svg')}}" width="100%">
			
		</div>
		<div class="col-md-6">
			<h3 class="mt-5">Subscribe to our newsletter</h3>
			<p>Get the best high potential coins right into your inbox.</p>
			<form class="login-form" autocomplete="off" method="POST" class="login-form" action="{{ url('subscribe') }}">
                        @csrf
						<input type="email" name="email" placeholder="Email" style="width:80%;margin-top:3%;background-color:white;border:1px solid white;" value="@if(Auth::user()){{Auth::user()->email}} @endif">
						
						<button class="btn btn-info" style="width:80%;margin-top:5%;margin-bottom:5%;background-color:#66a6ff;border-color:#66a6ff; ">Submit</button>
					</form>
			
		</div>
	</div>
</div>
@endsection