@extends('admin.dashadmin2')
@section('content')

<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="../css/monstyle.css">
<style>
.table thead th {
	font-size: 20px;
}
.heading-section {
	font-size: 40px;
}
.table tbody td.status .off:after {
background: rgba(151, 44, 44, 0);
}

.d-block {
    display: block !important;
}
</style>
	
	
		<div class=" container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Hostory</h2>
					@if (Session::has('success'))
						<div class="alert alert-success">
							{{Session::get('success')}}
							{{Session::put('success',null)}}
						</div>
					@endif
				</div>
			</div>
			<div class="row">
				<div class=" col-md-12 ">
					<div class="table-wrap ">
						
					
						<table class="table ">
						  <thead>
						    <tr>
						      <th>N°</th>
						      <th>Plat</th>
						      <th>From</th>
						      <th >Delivering to</th>
							  
						      
							
							
							 
						    </tr>
							
						  </thead>
						
						  <tbody>
							  @foreach ($orders as $order)
							  <form action="" method="get" enctype="multipart/form-data">
							 
						    <tr class="alert" role="alert">
						    	<td style="font-size: 15px; font-weight:bold ;">
											{{$order->id_ord}}
										  <input type="hidden" name="id_order" value="{{$order->id_ord}}">  
										  <input type="hidden" name="id_liv" value="1">
										  <input type="hidden" name="id_client" value="{{$order->id_client}}">
						    	</td>
						      <td >
								 
						      	{{-- <div class="img" style="background-image: url(uploads/avatars/{{$order->image}});"></div> --}}
						      
						      		{{-- <span>{{$order->nom_plat}}</span> --}}
									  <div class="container">
										<span  style="font-size: 15px; font-weight:bold ;">{{$order->nomplats}}</span>

									  </div>
						      
						      </td>
						      <td style="font-size: 15px; font-weight:bold ;">{{$order->nom}}
						
							<small class="d-block">{{$order->address}}</small>
						</td>
							  <td style="font-size: 15px; font-weight:bold ;">{{$order->rue}}</td> 

							


							  
							
						

						
				
						      {{-- <td>
						      	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				            	<span aria-hidden="true"><i class="fa fa-close"></i></span>
				          	</button>
				        	</td> --}}
						    </tr>
						</form>
							@endforeach
						
							
						 
						  </tbody>
						</table>
					
						@if (Session::has('null'))
						<div class="alert alert-danger">
							{{Session::get('null')}}
							{{Session::put('null',null)}}
						</div>
					@endif
					</div>
				</div>
			</div>
		</div>
	

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

@endsection

