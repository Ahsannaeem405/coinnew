@extends('../layouts/main')
@section('title')
New
@endsection
@section('body_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 ">
			<div class="contact-div p-5">
				<center>
					<div class="form-wrapper mt-2">
							<h2 class="title">My BuyBot Telegram Channel</h2>
                            <a class="tele-card mt-5" href="#">
                                <img src="https://images.unsplash.com/photo-1604594849809-dfedbc827105?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="channel-img" class="img-fluid">
                                <div class="card-details">
                                    <div class="card-title my-2 px-1 px-md-5">
                                        <h4>{{'@'}}crobuy</h4>
                                        <span><i class="fa fa-wifi" aria-hidden="true"></i> 2,305 subscribers</span>
                                    </div>
                                    <div class="card-disc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim ut 
                                                soluta qui repellat! Cum minima libero ex natus perspiciatis facere 
                                                debitis nemo omnis quae obcaecati saepe suscipit, doloremque, magnam 
                                                eum.</p>
                                    </div>
                                </div>
                            </a>
							
						</div>
				</center>
			</div>
        </div>
    </div>
</div>
@endsection