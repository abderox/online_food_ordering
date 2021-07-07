@extends('layout.masterpro')
@section('content')


<link rel="stylesheet" type="text/css" href="css/montserrat-font.css">
<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
<!-- Main Style Css -->
<link rel="stylesheet" href="css/style.css"/>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<div class="form-v10">
	
<style>
		input[type="file"] {
				display: none;
			}
			.custom-file-upload {
				border: 1px solid #ccc;
				display: inline-block;
				padding: 6px 12px;
				cursor: pointer;
			}
</style>
	<div class="page-content">
		
		<div class="form-v10-content">
			<form class="form-detail" action="{{url('/addtodata')}}" method="POST"  id="myform">
				{{csrf_field()}}
				
				<div class="form-left">
					<h2>General Infomation</h2>
					<div class="form-row">
						@if (Session::has('success'))
						<script>
							swal({
								title: "{!! Session::get('success')!!}" + "{!!  Session::put('success',null)!!}"
							});
						</script>
					@endif
					@if (Session::has('error'))
					<script>
						swal({
							icon:'error',
							title: "{!! Session::get('error') !!}" + "{!!  Session::put('error',null)!!}"
						});
					</script>
				@endif
				@if ($errors->any())
					@foreach ($errors->all() as $error)
       			
						<script>
							swal({
							icon:'error',
							title: "{!! $error !!}"
						});
						</script>
      			    @endforeach
					  @endif
			{{-- @endif
				@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif --}}
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="last_name"  id="last_name" value="{{$user['name']}}" class="input-text" placeholder="Last Name" required>
							
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="first_name"  id="first_name"  class="input-text" placeholder="First Name" required>
						</div>
						
						
					</div>
					<div class="form-row">
						<input type="date" name="date_naissance"  id="date_naissance" class="input-text" placeholder="Date naissance" required>
					</div>
					<div class="form-row">
						<input type="email"  name="email" value="{{$user['email']}}" placeholder="Your Email" class="input-text" required>
					</div>
					<div class="form-row">
						<input type="tel" name="phone_number" value="{{$user['phone_number']}}" placeholder="Phone Number" class="input-text" required>
						
					</div>
					<div class="form-group">
					<div class="form-row form-row-1">
						<input type="text"  name="department" placeholder="Department" required>
					</div>
					<div class="form-row form-row-2">
						<input type="text"  name="zip" placeholder="Zip Code" required>
						<input type="hidden" name="id" value="{{$user['id']}}">
						
						
					</div>
					
				</div>
				<div class="form-group">
				<div class="form-row form-row-1">
					<label for="file-upload" class="custom-file-upload">
						Upload ID
				   </label>
				   <input name="image" id="file-upload" type="file"/>
					  <input type="hidden" name="_token" value="{{ csrf_token() }}">
					
				</div>
				<div class="form-row form-row-2">
					<label for="file-upload" class="custom-file-upload">
						Upload profile image
				   </label>
				   <input name="imageid" id="file-upload" type="file"/>
					  <input type="hidden" name="_token" value="{{ csrf_token() }}">
					
				</div>
			</div>
				
					
						
			
					
				</div>
				
				<div class="form-right" style="background-color: yellowgreen">
					<h2>Job Questions</h2>
					<div class="form-row" style="margin-top: -10px;">
						<div class="py-2 h5"><b>Q.please precise your gender !</b></div>
					</div>
					<div class="form-row">
							<div class="form-checkbox" style="margin-top: -20px;">
						<label ><p>Male</p>
						  	<input type="radio" name="gender" value="true">
						
						  	<span class="checkmark"></span>
						</label>
						
					</div>
				
					<div class="form-checkbox "style="margin-top: -10px;">
						<label ><p>Female</p>
						  	<input type="radio" name="gender" value="false">
						
						  	<span class="checkmark"></span>
						</label>
					</div>
					</div>
					<div class="form-row">
						<div class="py-2 h5"><b>Q. Est ce que vous posséder une véhicule : vélo,scotter,</b></div>
					</div>
					<div class="form-row">
							<div class="form-checkbox" style="margin-top: -20px;">
						<label ><p>YES</p>
						  	<input type="radio" name="status_vehicule" value="true">
						
						  	<span class="checkmark"></span>
						</label>
						
					</div>
				
					<div class="form-checkbox "style="margin-top: -10px;">
						<label ><p>NO</p>
						  	<input type="radio" name="status_vehicule" value="false">
						
						  	<span class="checkmark"></span>
						</label>
					</div>
					</div>
					<div class="form-row">
						<div class="py-2 h5"><b>Q.avez vous déjà travailler dans la livraison ?</b></div>
					</div>
					<div class="form-row">
							<div class="form-checkbox" style="margin-top: -20px;">
						<label ><p>YES</p>
						  	<input type="radio" name="status_expr" value="true">
						
						  	<span class="checkmark"></span>
						</label>
						
					</div>
				
					<div class="form-checkbox "style="margin-top: -10px;">
						<label ><p>NO</p>
						  	<input type="radio" name="status_expr" value="false">
						
						  	<span class="checkmark"></span>
						</label>
					</div>
					</div>
				
					
						<div class="form-row">
							<div class="py-2 h5"><b>Est ce que vous êtes un étudiant ?</b></div>
						</div>
						<div class="form-row">
								<div class="form-checkbox" style="margin-top: -20px;">
							<label ><p>YES</p>
								  <input type="radio" name="status_etud" value="true">
							
								  <span class="checkmark"></span>
							</label>
							
						</div>
					
						<div class="form-checkbox "style="margin-top: -10px;">
							<label ><p>NO</p>
								  <input type="radio" name="status_etud" value="false">
							
								  <span class="checkmark"></span>
							</label>
						</div>
						</div>
					
					<div class="form-row-last">
						<input type="submit" name="register" class="register" value="Apply">
						
					</div>
					
					
				</div>
			</form>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        $('#date_naissance').datepicker();        
    });
</script>
@endsection