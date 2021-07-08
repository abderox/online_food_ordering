@extends('admin.dashlivreur2')
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
.table tbody td.statu span {
    position: relative;
    border-radius: 30px;
    padding: 4px 10px 4px 25px;
}
</style>
	
		<div class=" container ">
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
				<div class=" col-md-12 ">
					<div class="table-wrap ">
						
					
						<table class="table ">
						  <thead>
						    <tr>
						      <th>N°</th>
						      <th>Plat</th>
						      <th>From</th>
							  <th >Order </th>
						      <th colspan="2">Take</th>
							
							
							 
						    </tr>
							
						  </thead>
						
						  <tbody>
							  @foreach ($orders as $order)
							  <form action="{{url('/take')}}" method="get" enctype="multipart/form-data">
							 
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
							 

							


							  
							  @php 
							//$created = new Carbon\Carbon($order->created_at);
                			$now = Carbon\Carbon::now();
                
							
							$startTime = Carbon\Carbon::parse($order->created_at);
   							 $endTime = Carbon\Carbon::parse($now);
							 $p=60;
							 $lo = $p - (int)$endTime->diffForHumans($startTime);
							 $difference = (($p - (int)$endTime->diffForHumans($startTime))<1)
                    		? $time= ' just now'
                    		: $time = $lo . ' minutes ago'
							 
   							
							 
								 @endphp
								@if($lo>50)
							  <td colspan="2" class="status"><span style="background-color: rgba(151, 44, 44, 0.287); color:#b60e0e" class="off waiting">Served!!</span></td>
							  @elseif($lo>7)
							  <td colspan="2"  class="statu"><span style="background-color: rgba(151, 44, 44, 0.287); color:#b60e0e" class="off waiting">{{$difference}}</span></td>
							  @elseif($lo==5 )
								<td colspan="2"  class="statu"><span class="waiting">{{$difference}}</span></td>
								@elseif($lo<4)
								<td colspan="2" class="statu"><span class="active">{{$difference}}</span></td>
								
							  @endif
							
						<td><input type="submit" class="btn btn-success" value="Take"></td>

						
				
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
						<script>
							swal({
								icon: "error"
								title: "{!! Session::get('null')!!}" + "{!!  Session::put('null',null)!!}"
							});
						</script>
					@endif
					
					</div>
				</div>
			</div>
		</div>
	

	<script src="../js/jquery.min.js"></script>
  <script src="../js/popper.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/main.js"></script>

@endsection

