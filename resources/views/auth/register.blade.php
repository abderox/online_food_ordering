
<!--===============================================================================================-->
@extends('layout.masterlog')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" >
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util1.css">
	<link rel="stylesheet" type="text/css" href="css/main2.css">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form"  method="POST" action="{{ route('register') }}">
                    @csrf
					<span class="login100-form-title p-b-43">
						{{ __('Register') }}
					</span>
					
					<div class="wrap-input100 validate-input" data-validate = "Valid Username is required: abcdefghijklmno">
						<input type="text" class="input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100 @error('email') is-invalid @enderror" type="text" name="email" id="email"  value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="this field is required">
						<input class="input100 @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}"   id="phone_number" type="text"  required autocomplete="phone_number">
                        @error('phone_number')
		                    <span class="invalid-feedback" role="alert">
			                    <strong>{{ $message }}</strong>
		                    </span>
		                @enderror
						<span class="focus-input100"></span>
						<span class="label-input100">Phone Number</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100 @error('password') is-invalid @enderror" type="password" name="password" id="password" required autocomplete="new-password">
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>
                    <div class="wrap-input100 validate-input" >
						<input class="input100 " type="password" name="password_confirmation" id="password-confirm" required autocomplete="new-password">
                       
						<span class="focus-input100"></span>
						<span class="label-input100">Confirm Password</span>
					</div>

					
		
					
					<div class="container-login100-form-btn p-t-25">
						<button class="login100-form-btn" style="background: rgb(51, 184, 123) ; border-radius:50px; width:190px;height:50px" type="submit">
                            {{ __('Register') }}
						</button>
                      
					</div>
				
			
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or return to log in if you have an account ! 
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="{{route('login')}}" style="background: rgb(51, 184, 123)" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="far fa-user-circle" aria-hidden="true"></i>
						</a>
                        
						
					</div>
				</form>

				<div class="login100-more pull-right p-t-4 " style="background-image: url('images/Uber-for-delivery.jpg');">
					<button class="login100-form-btn" style="background: rgb(51, 184, 123) ; width:120px;height:40px" type="button" style="border-radius:20px,50px,0px,5px">
						
						<a href="{{route('login')}}" style="color: white">
							{{ __('Return') }}	
						</a>
					</button>
				</div>
        	</div>
		</div>
	</div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main1.js"></script>
	
	@endsection

	
	
