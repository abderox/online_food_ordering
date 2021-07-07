@extends('layouts.app')
@section('content')
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/monstyle.css">
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

}
</style>
	
	<section class="ftco-section">
		<div class=" container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Delivery guys status</h2>
					@if (Session::has('success'))
						<div class="alert alert-success">
							{{Session::get('success')}}
							{{Session::put('success',null)}}
						</div>
					@endif
				</div>
			</div>
			<div class="row">
				<div class=" col-md-12">
					<div class="table-wrap">
						
					<form action="{{url('/take')}}" method="get" enctype="multipart/form-data">
						<table class="table table-responsive-md">
						  <thead>
						    <tr>
						      <th>N°</th>
						      <th>Plat</th>
						      <th>From</th>
						      <th>Delivering to</th>
							  <th>Order</th>
						      <th>take</th>
							  <th></th>
						    </tr>
						  </thead>
						
						  <tbody>
							  @foreach ($orders as $order)
								  
							 
						    <tr class="alert" role="alert">
						    	<td>
											{{$order->id_ord}}
										  <input type="hidden" name="id_order" value="{{$order->id_ord}}">  
										  <input type="hidden" name="id_liv" value="1">
										
						    	</td>
						      <td class="d-flex align-items-center">
								 
						      	{{-- <div class="img" style="background-image: url(uploads/avatars/{{$order->image}});"></div> --}}
						      	<div class="pl-3 email">
						      		<span>{{$order->nom_plat}}</span>
						      		<span>{{$order->created_at}}</span>
						      	</div>
						      </td>
						      <td>{{$order->address}}</td>
							  <td>{{$order->address_client}}</td> 

							


							  
							  @php 
							//$created = new Carbon\Carbon($order->created_at);
                			$now = Carbon\Carbon::now();
                
							
							$startTime = Carbon\Carbon::parse($order->create_at);
   							 $endTime = Carbon\Carbon::parse($now);
							 $p=60;
							 $lo = $p - (int)$endTime->diffForHumans($startTime);
							 $difference = (($p - (int)$endTime->diffForHumans($startTime))<1)
                    		? $time= ' just now'
                    		: $time = $lo . ' minutes ago'
							 
   							
							 
								 @endphp
								@if($lo==59)
							  <td class="status"><span style="background-color: rgba(151, 44, 44, 0.287); color:#b60e0e" class="off waiting">Must be served</span></td>
							  @elseif($lo>7)
							  <td class="status"><span style="background-color: rgba(151, 44, 44, 0.287); color:#b60e0e" class="off waiting">{{$difference}}</span></td>
							  @elseif($lo==5 )
								<td class="status"><span class="waiting">{{$difference}}</span></td>
								@elseif($lo<4)
								<td class="status"><span class="active">{{$difference}}</span></td>
								
							  @endif
							
						<td><input type="submit" class="btn btn-success" value="Take"></td>
						<td></td>
					</form>
						      {{-- <td>
						      	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				            	<span aria-hidden="true"><i class="fa fa-close"></i></span>
				          	</button>
				        	</td> --}}
						    </tr>
							@endforeach
							
						    {{-- <tr class="alert" role="alert">
						    	<td>
						    		<label class="checkbox-wrap checkbox-primary">
										  <input type="checkbox">
										  <span class="checkmark"></span>
										</label>
						    	</td>
						      <td class="d-flex align-items-center">
						      	<div class="img" style="background-image: url(images/person_2.jpg);"></div>
						      	<div class="pl-3 email">
						      		<span>jacobthornton@email.com</span>
						      		<span>Added: 01/03/2020</span>
						      	</div>
						      </td>
						      <td>Jacobthornton</td>
						      <td class="status"><span class="waiting">Waiting for Resassignment</span></td>
						      <td>
						      	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				            	<span aria-hidden="true"><i class="fa fa-close"></i></span>
				          	</button>
				        	</td>
						    </tr>
						    <tr class="alert" role="alert">
						    	<td>
						    		<label class="checkbox-wrap checkbox-primary">
										  <input type="checkbox">
										  <span class="checkmark"></span>
										</label>
						    	</td>
						      <td class="d-flex align-items-center">
						      	<div class="img" style="background-image: url(images/person_3.jpg);"></div>
						      	<div class="pl-3 email">
						      		<span>larrybird@email.com</span>
						      		<span>Added: 01/03/2020</span>
						      	</div>
						      </td>
						      <td>Larry_bird</td>
						      <td class="status"><span class="active">Active</span></td>
						      <td>
						      	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				            	<span aria-hidden="true"><i class="fa fa-close"></i></span>
				          	</button>
				        	</td>
						    </tr>
						    <tr class="alert" role="alert">
						    	<td>
						    		<label class="checkbox-wrap checkbox-primary">
										  <input type="checkbox">
										  <span class="checkmark"></span>
										</label>
						    	</td>
						      <td class="d-flex align-items-center">
						      	<div class="img" style="background-image: url(images/person_4.jpg);"></div>
						      	<div class="pl-3 email">
						      		<span>johndoe@email.com</span>
						      		<span>Added: 01/03/2020</span>
						      	</div>
						      </td>
						      <td>Johndoe1990</td>
						      <td class="status"><span class="active">Active</span></td>
						      <td>
						      	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				            	<span aria-hidden="true"><i class="fa fa-close"></i></span>
				          	</button>
				        	</td>
						    </tr>
						    <tr class="alert" role="alert">
						    	<td class="border-bottom-0">
						    		<label class="checkbox-wrap checkbox-primary">
										  <input type="checkbox">
										  <span class="checkmark"></span>
										</label>
						    	</td>
						      <td class="d-flex align-items-center border-bottom-0">
						      	<div class="img" style="background-image: url(images/person_1.jpg);"></div>
						      	<div class="pl-3 email">
						      		<span>garybird@email.com</span>
						      		<span>Added: 01/03/2020</span>
						      	</div>
						      </td>
						      <td class="border-bottom-0">Garybird_2020</td>
						      <td class="status border-bottom-0"><span class="waiting">Waiting for Resassignment</span></td>
						      <td class="border-bottom-0">
						      	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				            	<span aria-hidden="true"><i class="fa fa-close"></i></span>
				          	</button>
				        	</td>
						    </tr> --}}
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
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

@endsection

