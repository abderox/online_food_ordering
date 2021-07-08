@extends('admin.dashadmin2')
@section('content')

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
.cl{
           
		   margin: 0;
		 background-image: linear-gradient(-45deg,#0dac42, #abe73c, #23a6d5, #23d5ab) !important;
		  height: 100%;
		  background-repeat: no-repeat;
		  /* filter: blur(5px);
		  -webkit-filter: blur(5px);
		  -moz-filter: blur(5px);
		  -o-filter: blur(5px);
		  -ms-filter: blur(5px); */
		  animation-name: nono;
		  animation-duration: 10s;
		  background-size: 400% 400%;
		  animation-iteration-count: infinite;
		  animation-direction:normal;
		  animation-timing-function: ease-out;
		  }
		  @keyframes nono 
		  {
			0% {
				background-position: 0% 50%;
			}
			50% {
				background-position:  50% 100%;
			}
			100% {
				background-position: 0% 50%;
			} }
		 
	
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
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	
     <div class="container " style="margin-top: 100px">
		
		<div class="main-body">
			<div class="row">
                @foreach ($demandes_livreurs as $demandes_livreur)
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							@if (Session::has('success'))
							<script>
								swal({
									title: "{!! Session::get('success')!!}" + "{!!  Session::put('success',null)!!}"
								});
							</script>
						@endif
						
							<div class="d-flex flex-column align-items-center text-center">
								<img src="../uploads/avatars/{{$demandes_livreur->image}}" alt="livreur" class="rounded-circle p-1 bg-dark" width="110">
								<div class="mt-3">

									<h4 style="margin-top: 20px; margin-bottom:15px">{{$demandes_livreur->name}} {{$demandes_livreur->prenom}}</h4>
								
                                    <a class="btn btn-outline-danger" href="../sendn/{{$demandes_livreur->email}}">Alert</a>
									<a class="btn btn-outline-success" href="../sendp/{{$demandes_livreur->email}}">let him join</a>
									<input type="hidden" name="id_u" value="{{$demandes_livreur->id_user}}">
                                    
								</div>
							</div>
							<hr class="my-4">
							<ul class="list-group list-group-flush">
                               
                                    
                              
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap " >
									<h6 class="mb-0"><svg class="svg-icon" viewBox="0 0 20 20">
                                        <path fill="none"  viewBox="0 0 24 24" d="M10.033,10.349c-0.222-0.165-0.429-0.41-0.437-0.485c0-0.13,0-0.19,0.306-0.44c0.397-0.324,0.615-0.752,0.615-1.204c0-0.39-0.109-0.739-0.297-0.992h0.166l0.917-0.694H8.82c-0.996,0-1.869,0.782-1.869,1.673c0,0.921,0.674,1.621,1.581,1.659c-0.013,0.065-0.021,0.13-0.021,0.193c0,0.133,0.03,0.261,0.091,0.383c-1.125,0.007-2.071,0.76-2.071,1.646c0,0.799,0.912,1.377,2.167,1.377c1.356,0,2.087-0.848,2.087-1.646C10.785,11.154,10.582,10.755,10.033,10.349 M8.007,8.18c-0.042-0.332,0.028-0.64,0.187-0.823c0.097-0.111,0.222-0.171,0.361-0.171V7.007h0l0.016,0.18C8.988,7.2,9.387,7.691,9.461,8.283C9.503,8.622,9.43,8.936,9.267,9.125c-0.097,0.111-0.219,0.17-0.371,0.17h0C8.488,9.283,8.081,8.771,8.007,8.18 M8.694,12.775c-0.619,0-1.104-0.398-1.104-0.906c0-0.465,0.567-0.874,1.214-0.874v-0.181l0.017,0.181c0.139,0.001,0.275,0.022,0.403,0.063l0.127,0.092c0.329,0.234,0.503,0.367,0.555,0.582c0.013,0.057,0.019,0.113,0.019,0.168C9.927,12.48,9.512,12.775,8.694,12.775 M13.463,6.963h-0.866v1.3h-1.304v0.867h1.304v1.295h0.866V9.131h1.307V8.264h-1.307V6.963z M17.799,0.468H2.202c-0.957,0-1.733,0.776-1.733,1.733v15.598c0,0.955,0.776,1.732,1.733,1.732h15.597c0.956,0,1.732-0.777,1.732-1.732V2.201C19.531,1.244,18.755,0.468,17.799,0.468M18.665,17.799c0,0.479-0.389,0.865-0.866,0.865H2.202c-0.479,0-0.867-0.387-0.867-0.865V2.201c0-0.478,0.388-0.867,0.867-0.867h15.597c0.478,0,0.866,0.389,0.866,0.867V17.799z"></path>
                                    </svg>Gmail</h6>
									<a href="https://mail.google.com/mail/u/0/?pli=1#inbox?compose=new" target="_blank"><span style="font-size:13px" class="text-secondary">{{$demandes_livreur->email}}</span></a>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0"><svg class="svg-icon" viewBox="0 0 20 20">
                                        <path fill="none" d="M12.443,9.672c0.203-0.496,0.329-1.052,0.329-1.652c0-1.969-1.241-3.565-2.772-3.565S7.228,6.051,7.228,8.02c0,0.599,0.126,1.156,0.33,1.652c-1.379,0.555-2.31,1.553-2.31,2.704c0,1.75,2.128,3.169,4.753,3.169c2.624,0,4.753-1.419,4.753-3.169C14.753,11.225,13.821,10.227,12.443,9.672z M10,5.247c1.094,0,1.98,1.242,1.98,2.773c0,1.531-0.887,2.772-1.98,2.772S8.02,9.551,8.02,8.02C8.02,6.489,8.906,5.247,10,5.247z M10,14.753c-2.187,0-3.96-1.063-3.96-2.377c0-0.854,0.757-1.596,1.885-2.015c0.508,0.745,1.245,1.224,2.076,1.224s1.567-0.479,2.076-1.224c1.127,0.418,1.885,1.162,1.885,2.015C13.961,13.689,12.188,14.753,10,14.753z M10,0.891c-5.031,0-9.109,4.079-9.109,9.109c0,5.031,4.079,9.109,9.109,9.109c5.031,0,9.109-4.078,9.109-9.109C19.109,4.969,15.031,0.891,10,0.891z M10,18.317c-4.593,0-8.317-3.725-8.317-8.317c0-4.593,3.724-8.317,8.317-8.317c4.593,0,8.317,3.724,8.317,8.317C18.317,14.593,14.593,18.317,10,18.317z"></path>
                                    </svg>Tel</h6>
									<span class="text-secondary">{{$demandes_livreur->phone_number}}</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0"><i style="color: #4691f6" class="fas fa-id-card"></i></h6>
	
									<a href="http://127.0.0.1:8000/uploads/avatars/identity/{{$demandes_livreur->image}}" target="_blank"><span class="text-secondary">Identity card</span></a>
								</li>
                               
								<li class="list-group-item d-flex justify-content-center align-items-center flex-wrap">
									<h6 class="mb-0" style="font-size: 25px">Job info</h6>
									
								</li>
                                @if ($demandes_livreur->status_etud==1)
                  
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        
                                    <span class="text-secondary"> &#8226;Etudiant</span>
                                </li> 
                                    @else
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        
                                        <span class="text-secondary"></span>
                                    </li>
                                    @endif
                                    @if ($demandes_livreur->status_vehicule==1)
                                    
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        
                                        <span class="text-secondary"> &#8226;Vehiculé</span>
                                    </li>
                                    @else
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        
                                        <span class="text-secondary"> &#8226;Non Vehiculé</span>
                                    </li>
                                    @endif
                                    @if ($demandes_livreur->status_genre==1)
                                
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        
                                        <span class="text-secondary"> &#8226;Male</span>
                                    </li>
                                    @else 
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        
                                        <span class="text-secondary"> &#8226;Female</span>
                                    </li>
                                    @endif
                
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                     @php
										 $age= Carbon\Carbon::parse($demandes_livreur->date_naissance)->diff(Carbon\Carbon::now())->y;
									 @endphp                   
										<span class="text-secondary">&#8226; Age :<strong >{{$age}}</strong> ans </span>
									</li>  
                                   
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
                            <form action="{{url('/accept')}}" method="get" enctype="multipart/form-data">
                                @csrf
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Full Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="{{$demandes_livreur->name}} {{$demandes_livreur->prenom}}">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="email" class="form-control" value="{{$demandes_livreur->email}}">
                                    <input type="hidden" name="id" value="{{$demandes_livreur->id}}">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="{{$demandes_livreur->phone_number}}">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Zip</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="{{$demandes_livreur->zip}}">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Address</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="{{$demandes_livreur->departement}}">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Date naissance</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="date" class="form-control" value="{{$demandes_livreur->date_naissance}}">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									{{-- <a href="../accept" class="btn btn-dark">Accept</a> --}}
                                    <input type="submit" class="btn btn-dark" value="Accept">
                                    <a href="../delete/{{$demandes_livreur->id}}" class="btn btn-danger">Delete</a>
								</div>
                                
								
							</div>
                        </form>
						</div>
					</div>
				
				</div>
                @endforeach
			</div>
		</div>
      
	</div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
@endsection