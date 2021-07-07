@extends('admin.dashlivreur')
@section('content')
<div class="container">
	@if ($errors->any())
	<div class="alert alert-danger">
	  <ul>
		@foreach($errors->all() as $error)
		<li>
		  {{$error}}
		</li>
		@endforeach
	  </ul>
	 </div>
	@endif
	@if(session()->get('message'))
	<div class="alert alert-success" role="alert">
	  <strong>Success: </strong>{{session()->get('message')}}
	</div>
	@endif
	<style type="text/css">
   
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: rgba(255, 255, 255, 0);
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}
.me-2 {
    margin-right: .5rem!important;
}
.svg-icon {
  width: 1.3em;
  height: 1.3em;
  margin-right: 0.4em;
}


.svg-icon path,
.svg-icon polygon,
.svg-icon rect {
  fill: #4691f6;
}

.svg-icon circle {
  stroke: #4691f6;
  stroke-width: 1;
}

		  /* filter: blur(5px);
		  -webkit-filter: blur(5px);
		  -moz-filter: blur(5px);
		  -o-filter: blur(5px);
		  -ms-filter: blur(5px); */
		
			input[type="file"] {
				display: none;
			}
			.custom-file-upload {
				border: 1px solid #ccc;
				display: inline-block;
				padding: 6px 12px;
				cursor: pointer;
			}
	
	  html,body{
            margin: 0;
            height: 100%;
            font-family: 'Roboto Condensed', sans-serif !important;
            scroll-behavior: smooth;
        }
		@import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap');
        *{
           
            box-sizing: border-box;
            
        }
    </style>
	 <link href="http://netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
	
     <div class="container  " style="margin-top: 100px>
		
		<div class="main-body">
			<div class="row">
              
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							@if (Session::has('status'))
							<script>
								swal({
									title: "{!! Session::get('status')!!}" + "{!!  Session::put('status',null)!!}"
								});
							</script>
						@endif
						@if ($message = Session::get('success'))
							<script>
								swal({
									title: "{!! $message !!}"
								});
							</script>
						@endif
                    {{-- @if($message = Session::get('success'))
                      <div class="alert alert-success">
                   <p>{{$message}}</p>
                      </div>
                   @endif --}}
				   <form action="{{url('/profileUpdate')}}" method="POST" enctype="multipart/form-data">
                    @csrf
						
							<div class="d-flex flex-column align-items-center text-center">
								<img src="../uploads/avatars/{{Auth::user()->image}}" alt="livreur" class="rounded-circle p-1 bg-dark" width="110">
								<div class="mt-3">

									<h4 style="margin-top: 20px; margin-bottom:15px">{{$user['name']}} {{$user['prenom']}}</h4>
									
                                  
									<label for="file-upload" class="custom-file-upload">
										Upload
								   </label>
								   <input name="image" id="file-upload" type="file"/>
                         			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
									
                                    
								</div>
							</div>
							<hr class="my-4">
					
                                    
                
                                    
                           
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
						
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">First Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="prenom" value=" {{Auth::user()->prenom}}">
								</div>
							</div>	
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Last Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control"  name="name" value=" {{Auth::user()->name}}">
                                    
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="email" class="form-control" value="{{Auth::user()->email}}">
                                    
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="phone_number" value="{{Auth::user()->phone_number}}">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Zip</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="zip" class="form-control" value="{{Auth::user()->zip}}">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Address</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="departement" value="{{Auth::user()->departement}}">
								</div>
							</div>
                            
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									{{-- <a href="../accept" class="btn btn-dark">Accept</a> --}}
									<button class="btn btn-primary" type="submit">Save</button>
								</div>
                                
								
							</div>
                       
						</div>
					</div>
				
				</div>
			</form>
			</div>
		</div>
      
	</div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
@endsection